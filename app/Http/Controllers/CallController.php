<?php

namespace App\Http\Controllers;

use App\Enums\VoiceLine;
use App\Models\PhoneNumber;
use App\Models\User;
use App\Packages\Mediana\Api\MessagesApi;
use App\Packages\Mediana\Configuration;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

class CallController extends Controller
{
    public $week = [
        1 => 3,
        2 => 4,
        3 => 5,
        4 => 6,
        5 => 7,
        6 => 1,
        0 => 2
    ];

    public function incoming(Request $request)
    {
        $phoneNumber = PhoneNumber ::query() -> where('phone_number', '0'.$request -> input('CalledNumber')) -> first();

        if (!isset($phoneNumber)) {
            return response() -> json([
                'status'      => 0,
                'status_code' => 2,
                'message'     => 'line not found',
                'data'        => [
                    'voice' => "sample.mp3",
                ],
            ], 404);
        }

        $phoneNumber = $phoneNumber->owner()->first()->phoneNumbers()->first();

        $activeTime = $phoneNumber -> activeTime() -> first();
        if (isset($activeTime)) {
            if ($activeTime -> from_day <= $this->week[now()->timezone('Asia/Tehran') -> dayOfWeek] && $activeTime -> to_day >= $this->week[now()->timezone('Asia/Tehran') -> dayOfWeek]) {
                if ($activeTime -> from_time <= now()->timezone('Asia/Tehran') -> format('H:i:s') && $activeTime -> to_time >= now()->timezone('Asia/Tehran') -> format('H:i:s')) {
                } else {
                    return response() -> json([
                        'status'      => 0,
                        'status_code' => 3,
                        'message'     => 'line deactivate',
                        'data'        => [
                            'voice' => $phoneNumber->voiceLines()->where('type',VoiceLine::deactivate)->value('name'),
                        ],
                    ], 400);
                }
            } else {
                return response() -> json([
                    'status'      => 0,
                    'status_code' => 3,
                    'message'     => 'line deactivate',
                    'data'        => [
                        'voice' => $phoneNumber->voiceLines()->where('type',VoiceLine::deactivate)->value('name'),
                    ],
                ], 400);
            }
        }
        return response() -> json([
            'status'      => 1,
            'status_code' => 0,
            'message'     => 'success',
            'data'        => [
                'caller_id' => $request -> input('CalledNumber'),
                'voice' => $phoneNumber->voiceLines()->where('type',VoiceLine::income)->value('name'),
                "ivr_timeout" => "4",
                "ivr_timeout_method" => $phoneNumber->redirects()->where('number', '0')->exists() ? "forward" : "hangup",
                "ivr_timeout_forward_number" => $phoneNumber -> redirects() -> where('number',
                    '0') -> first() ?->operator() ?->value('phone_number'),
                "instant_forward" => $phoneNumber->direct ? 1 : 0,
                "instant_forward_number" => $phoneNumber -> redirects() -> where('number',
                    '10') -> first() ?->operator() ?->value('phone_number'),
            ],
        ]);

    }

    public function redirect(Request $request)
    {
        $phoneNumber = PhoneNumber ::query() -> where('phone_number', '0'.$request -> input('CalledNumber')) -> first();

        if (!isset($phoneNumber)) {
            return response() -> json([
                'status'      => 0,
                'status_code' => 2,
                'message'     => 'line not found',
                'data'        => [
                    'voice' => "sample.mp3",
                ],
            ], 404);
        }

        $phoneNumber = $phoneNumber->owner()->first()->phoneNumbers()->first();


        $activeTime = $phoneNumber -> activeTime() -> first();

        if (isset($activeTime)) {
            if ($activeTime -> from_day <= $this->week[now()->timezone('Asia/Tehran') -> dayOfWeek] && $activeTime -> to_day >= $this->week[now()->timezone('Asia/Tehran') -> dayOfWeek]) {
                if ($activeTime -> from_time <= now()->timezone('Asia/Tehran') -> format('H:i:s') && $activeTime -> to_time >= now()->timezone('Asia/Tehran') -> format('H:i:s')) {
                } else {
                    return response() -> json([
                        'status'      => 0,
                        'status_code' => 3,
                        'message'     => 'line deactivate',
                        'data'        => [
                            'voice' => $phoneNumber->voiceLines()->where('type',VoiceLine::deactivate)->value('name'),
                        ],
                    ], 400);
                }
            } else {
                return response() -> json([
                    'status'      => 0,
                    'status_code' => 3,
                    'message'     => 'line deactivate',
                    'data'        => [
                        'voice' => $phoneNumber->voiceLines()->where('type',VoiceLine::deactivate)->value('name'),
                    ],
                ], 400);
            }
        }

        $redirect = $phoneNumber -> redirects()  -> where('number', $request -> input('Input' , '0')) -> first();

        if (!isset($redirect)) {
            return response() -> json([
                'status'      => 0,
                'status_code' => 4,
                'message'     => 'redirect not found',
                'data'        => [
                    'voice' => "invalid-digit.wav",
                ],
            ], 404);
        }

        $number = match ($request -> input('Try', 1)) {
            1 => $redirect -> operator() -> value('phone_number'),
            2 => $redirect -> backupOperator() -> value('phone_number'),
            default => null
        };
        if (empty($number))
        {
            if (!isset($redirect)) {
                return response() -> json([
                    'status'      => 0,
                    'status_code' => 3,
                    'message'     => 'line deactivate',
                    'data'        => [
                        'voice' => $phoneNumber->voiceLines()->where('type',VoiceLine::deactivate)->value('name'),
                    ],
                ], 400);
            }
        }
        if (!$phoneNumber->operators()->where('phone_number','0'.$request->input('CallerId'))->exists()) {
            $config = Configuration ::getDefaultConfiguration() -> setApiKey('Authorization', env('MEDIANA_API_KEY'))
                -> setApiKeyPrefix('Authorization', 'AccessKey');
            $apiInstance = new  MessagesApi(new Client(), $config);

            $pattern = new \App\Packages\Mediana\Model\PatternToSend([
                "pattern_code" => "3y9t524v691y6ua",
                "originator"   => env('MEDIANA_API_NUMBER'),
                "recipient"    => Str ::replaceFirst('0', '+98', $number),
                "values"       =>
                    [
                        "number"   => '+98'.$request -> input('CallerId'),
                        "digit"    => (string) $request -> input('Input'),
                        "duration" => Jalalian ::now() -> format('Y-m-d H:i:s')
                    ]
            ]);

            $apiInstance -> sendPattern($pattern);
        }

        return response() -> json([
            'status'      => 1,
            'status_code' => 0,
            'message'     => 'success',
            'data'        => [
                'forward_number' =>$number,
                'caller_id' => $request -> input('CalledNumber'),
            ],
        ]);
    }

    public function outAccess(Request $request)
    {
        $user = User::query()->where('email', '0'.$request->input('CallerId'))->whereHas('phoneNumbers',function ($q) use
        (
            $request
        ) {
            $q->where('phone_number','0'.$request->input('CalledNumber'));
        }
        )->first();
        if (!isset($user))
        {
            $line = PhoneNumber::query()->where('phone_number','0'.$request->input('CalledNumber'))->first();
            if (!isset($line)) {
                return response() -> json([
                    'status'      => 0,
                    'status_code' => 1,
                    'message'     => 'line not found',
                    'data'        => [
                    ],
                ], 404);
            }

            $line = $line->owner()->first()->phoneNumbers()->whereHas('operators',function ($q) use
            (
                $request
            ) {
                $q->where('phone_number','0'.$request->input('CallerId'))->where('outgoing_access',true);

            })->first();

            if (!isset($line)) {
                return response() -> json([
                    'status'      => 0,
                    'status_code' => 1,
                    'message'     => 'line not found',
                    'data'        => [
                    ],
                ], 404);
            }
        }
        return response() -> json([
            'status'      => 1,
            'status_code' => 0,
            'message'     => 'success',
            'data'        => [],
        ]);
    }

    public function outLine(Request $request)
    {
        $user = User::query()->where('email', '0'.$request->input('CallerId'))->whereHas('phoneNumbers',function ($q) use
        (
            $request
        ) {
            $q->where('phone_number','0'.$request->input('CalledNumber'));
        }
        )->first();
        if (!isset($user))
        {

            $line = PhoneNumber::query()->where('phone_number','0'.$request->input('CalledNumber'))->first();
            if (!isset($line)) {
                return response() -> json([
                    'status'      => 0,
                    'status_code' => 1,
                    'message'     => 'line not found',
                    'data'        => [
                    ],
                ], 404);
            }

            $line = $line->owner()->first()->phoneNumbers()->whereHas('operators',function ($q) use
            (
                $request
            ) {
                $q->where('phone_number','0'.$request->input('CallerId'))->where('outgoing_access',true);

            })->first();


            if (!isset($line)) {
                return response() -> json([
                    'status'      => 0,
                    'status_code' => 1,
                    'message'     => 'line not found',
                    'data'        => [
                    ],
                ], 404);
            }
        }
        return response() -> json([
            'status'      => 1,
            'status_code' => 0,
            'message'     => 'success',
            'data'        => [
                'caller_id' => $request->input('CalledNumber')
            ],
        ]);
    }

    public function hangout(Request $request)
    {
        $line = PhoneNumber::query()->where('phone_number', '0'.$request->input('BlazarNumber'))->firstOrFail();

        $line->callLogs()->create(
            [
                "meta_data" => $request->all(),
                'from' => $request->input('OriginatorUUID') ?? $request->input('UUID'),
                'duration' => 0
            ]);

        $packageUser = $line->owner->packages()->where('active',true)->decrement('remaining_incoming_seconds',$request->input('Duration'));


        return $request->all();
    }

    public function outHangout(Request $request)
    {
        $line = PhoneNumber::query()->where('phone_number', '0'.$request->input('BlazarNumber'))->firstOrFail();


        $line->callLogs()->create(
            [
                "meta_data" => $request->all(),
                'from' => $request->input('OriginatorUUID') ?? $request->input('UUID'),
                'duration' => 1
            ]);

        $packageUser = $line->owner->packages()->where('active',true)->decrement('remaining_outgoing_seconds',$request->input('Duration'));

        return $request->all();
    }
}
