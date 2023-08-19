<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumber;
use App\Models\User;
use Illuminate\Http\Request;

class CallController extends Controller
{

    public function incoming(Request $request)
    {
        $phoneNumber = PhoneNumber ::query() -> where('phone_number', $request -> input('line')) -> first();

        if (!isset($phoneNumber)) {
            return response() -> json([
                'status'      => false,
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
                        'status'      => false,
                        'status_code' => 3,
                        'message'     => 'line deactivate',
                        'data'        => [
                            'voice' => "sample.mp3",
                        ],
                    ], 400);
                }
            } else {
                return response() -> json([
                    'status'      => false,
                    'status_code' => 3,
                    'message'     => 'line deactivate',
                    'data'        => [
                        'voice' => "sample.mp3",
                    ],
                ], 400);
            }
        }

        return response() -> json([
            'status'      => true,
            'status_code' => 0,
            'message'     => 'success',
            'data'        => [
                'voice' => "sample.mp3",
            ],
        ]);

    }

    public function redirect(Request $request)
    {
        $phoneNumber = PhoneNumber ::query() -> where('phone_number', $request -> input('line')) -> first();

        if (!isset($phoneNumber)) {
            return response() -> json([
                'status'      => false,
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
                        'status'      => false,
                        'status_code' => 3,
                        'message'     => 'line deactivate',
                        'data'        => [
                            'voice' => "sample.mp3",
                        ],
                    ], 400);
                }
            } else {
                return response() -> json([
                    'status'      => false,
                    'status_code' => 3,
                    'message'     => 'line deactivate',
                    'data'        => [
                        'voice' => "sample.mp3",
                    ],
                ], 400);
            }
        }

        $redirect = $phoneNumber -> redirect() -> query() -> where('number', $request -> input('input')) -> first();

        if (!isset($redirect)) {
            return response() -> json([
                'status'      => false,
                'status_code' => 4,
                'message'     => 'redirect not found',
                'data'        => [
                    'voice' => "sample.mp3",
                ],
            ], 404);
        }

        return response() -> json([
            'status'      => true,
            'status_code' => 0,
            'message'     => 'success',
            'data'        => [
                'line' => match ($request -> input('try', 1)) {
                    1 => $redirect -> redirect_phone_number,
                    2 => $redirect -> backup_redirect_phone_number,
                    default => $redirect -> redirect_phone_number
                },
            ],
        ]);
    }

    public function outAccess()
    {
        return response() -> json([
            'status'      => true,
            'status_code' => 0,
            'message'     => 'success',
            'data'        => [],
        ]);
    }

    public function outLine(Request $request)
    {
        $user = User::query()->where('phone_number', $request->input('from'))->first();
        if (!isset($user))
        {
            return response() -> json([
                'status'      => false,
                'status_code' => 1,
                'message'     => 'line not found',
                'data'        => [

                ],
            ], 404);
        }
        return response() -> json([
            'status'      => true,
            'status_code' => 0,
            'message'     => 'success',
            'data'        => [
                'line' => $user->phoneNumbers()->first()->phone_number,
            ],
        ]);
    }
}
