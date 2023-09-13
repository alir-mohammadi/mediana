<?php

namespace App\Http\Controllers;

use App\Enums\VoiceLine;
use App\Models\PhoneNumber;
use App\Models\User;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

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
            $line = PhoneNumber::query()->where('phone_number','0'.$request->input('CalledNumber'))->whereHas('operators',function ($q) use
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
            $line = PhoneNumber::query()->where('phone_number','0'.$request->input('CalledNumber'))->whereHas('operators',function ($q) use
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
                'caller_id' => substr(($user?->phoneNumbers()->first()->phone_number ?? $line->phone_number),1)
            ],
        ]);
    }

    public function hangout(Request $request)
    {
        $line = PhoneNumber::query()->where('phone_number', '0'.$request->input('BlazarNumber'))->first();

        $line->callLogs()->create(
            [
                "meta_data" => $request->all(),
                'from' => $request->input('UUID'),
                'duration' => 0
            ]);

        return $request->all();
    }

    public function outHangout(Request $request)
    {
        $line = PhoneNumber::query()->where('phone_number', '0'.$request->input('BlazarNumber'))->first();


        $line->callLogs()->create(
            [
                "meta_data" => $request->all(),
                'from' => $request->input('UUID'),
                'duration' => 1
            ]);

        return $request->all();
    }
}
