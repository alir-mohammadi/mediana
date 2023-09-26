<?php

namespace App\Http\Controllers;

use App\Packages\Mediana\Api\MessagesApi;
use App\Packages\Mediana\Configuration;
use App\Packages\Mediana\Model\MessageToSend;
use Carbon\Carbon;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\VerificationCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthOtpController extends Controller
{
    // Return View of OTP Login Page
    public function login()
    {
        return view('auth.otp-login');
    }

    // Generate OTP
    public function generate(Request $request)
    {
        # Validate Data
        $request->validate([
            'email' => 'required|exists:users,email'
        ]);

        # Generate An OTP
        $verificationCode = $this->generateOtp($request->input('email'));

        $config = Configuration::getDefaultConfiguration()->setApiKey('Authorization', env('MEDIANA_API_KEY'))
            ->setApiKeyPrefix('Authorization', 'AccessKey');
        $apiInstance = new  MessagesApi(new Client(), $config);
        $pattern = new \App\Packages\Mediana\Model\PatternToSend([
            "pattern_code"=>"jidwaa6zaw7qsz0",
            "originator"=>env('MEDIANA_API_NUMBER'),
            "recipient"=>Str::replaceFirst('0','+98',$request->input('email')),
            "values"=>
                ["code"=>(string)$verificationCode->otp]
        ]);

        $apiInstance->sendPattern($pattern);

        return redirect()->route('otp.verification', ['user_id' => encrypt($verificationCode->user_id)]);
    }

    /**
     * @throws \Exception
     */
    public function generateOtp($email)
    {
        $user = User::where('email', $email)->first();

        # User Does not Have Any Existing OTP
        $verificationCode = VerificationCode::where('user_id', $user->id)->latest()->first();

        $now = Carbon::now();

        if($verificationCode && $now->isBefore($verificationCode->expire_at)){
            return $verificationCode;
        }

        // Create a New OTP
        return VerificationCode::create([
            'user_id' => $user->id,
            'otp' => random_int(123456, 999999),
            'expire_at' => Carbon::now()->addMinutes(10)
        ]);
    }

    public function verification($user_id)
    {
        return view('auth.otp-verification')->with([
            'user_id' => $user_id
        ]);
    }

    public function loginWithOtp(Request $request)
    {
        #Validation
        $request->validate([
            'user_id' => 'required',
            'otp' => 'required'
        ]);

        #Validation Logic
        $verificationCode   = VerificationCode::where('user_id', decrypt($request->input('user_id')))->where('otp', $request->input('otp'))->firstOrFail();

        $now = Carbon::now();
        if (!$verificationCode) {
            return redirect()->back()->with('error', 'Your OTP is not correct');
        }elseif($verificationCode && $now->isAfter($verificationCode->expire_at)){
            return redirect()->route('otp.login')->with('error', 'Your OTP has been expired');
        }

        $user = User::whereId(decrypt($request->input('user_id')))->first();

        if($user){
            // Expire The OTP
            $verificationCode->update([
                'expire_at' => Carbon::now()
            ]);

            Auth::login($user);

            return redirect()->route('dashboard');
        }

        return redirect()->route('otp.login')->with('error', 'Your Otp is not correct');
    }
}
