<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumber;
use App\Models\User;
use Illuminate\Http\Request;

class CallController extends Controller
{

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
            if ($activeTime -> from_day <= now() -> dayOfWeek && $activeTime -> to_day >= now() -> dayOfWeek) {
                if ($activeTime -> from_time <= now() -> format('H:i:s') && $activeTime -> to_time >= now() -> format('H:i:s')) {
                } else {
                    return response() -> json([
                        'status'      => 0,
                        'status_code' => 3,
                        'message'     => 'line deactivate',
                        'data'        => [
                            'voice' => "sample.mp3",
                        ],
                    ], 400);
                }
            } else {
                return response() -> json([
                    'status'      => 0,
                    'status_code' => 3,
                    'message'     => 'line deactivate',
                    'data'        => [
                        'voice' => "sample.mp3",
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
                'voice' => "mediana01.wav",
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
            if ($activeTime -> from_day <= now() -> dayOfWeek && $activeTime -> to_day >= now() -> dayOfWeek) {
                if ($activeTime -> from_time <= now() -> format('H:i:s') && $activeTime -> to_time >= now() -> format('H:i:s')) {
                } else {
                    return response() -> json([
                        'status'      => 0,
                        'status_code' => 3,
                        'message'     => 'line deactivate',
                        'data'        => [
                            'voice' => "sample.mp3",
                        ],
                    ], 400);
                }
            } else {
                return response() -> json([
                    'status'      => 0,
                    'status_code' => 3,
                    'message'     => 'line deactivate',
                    'data'        => [
                        'voice' => "sample.mp3",
                    ],
                ], 400);
            }
        }

        $redirect = $phoneNumber -> redirects()  -> where('number', $request -> input('Input')) -> first();

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

        return response() -> json([
            'status'      => 1,
            'status_code' => 0,
            'message'     => 'success',
            'data'        => [
                'redirect_number' => match ($request -> input('Try', 1)) {
                    1 => $redirect -> redirect_phone_number,
                    2 => $redirect -> backup_redirect_phone_number,
                    default => $redirect -> redirect_phone_number
                },
                'caller_id' => $request -> input('CalledNumber'),
            ],
        ]);
    }

    public function outAccess(Request $request)
    {
        $user = User::query()->where('email', '0'.$request->input('CallerId'))->first();
        if (!isset($user))
        {
            return response() -> json([
                'status'      => 0,
                'status_code' => 1,
                'message'     => 'line not found',
                'data'        => [
                ],
            ], 404);
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
        $user = User::query()->where('email', '0'.$request->input('CallerId'))->first();
        if (!isset($user))
        {
            return response() -> json([
                'status'      => 0,
                'status_code' => 1,
                'message'     => 'line not found',
                'data'        => [
                ],
            ], 404);
        }
        return response() -> json([
            'status'      => 1,
            'status_code' => 0,
            'message'     => 'success',
            'data'        => [
                'caller_id' => $user->phoneNumbers()->first()->phone_number,
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
                'duration' => $request->input('AnswerTime')
            ]);

        return $request->all();
    }
}
