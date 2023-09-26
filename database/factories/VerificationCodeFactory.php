<?php

namespace Database\Factories;

use App\Models\VerificationCode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class VerificationCodeFactory extends Factory
{

    protected $model = VerificationCode::class;

    public function definition(): array
    {
        return [
            'user_id'    => $this -> faker -> word(),
            'otp'        => $this -> faker -> word(),
            'expire_at'  => $this -> faker -> word(),
            'created_at' => Carbon ::now(),
            'updated_at' => Carbon ::now(),
        ];
    }
}
