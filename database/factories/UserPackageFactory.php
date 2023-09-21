<?php

namespace Database\Factories;

use App\Models\UserPackage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UserPackageFactory extends Factory
{

    protected $model = UserPackage::class;

    public function definition(): array
    {
        return [
            'user_id'           => $this -> faker -> randomNumber(),
            'package_id'        => $this -> faker -> randomNumber(),
            'remaining_seconds' => $this -> faker -> randomNumber(),
            'expire_at'         => Carbon ::now(),
            'started_at'        => Carbon ::now(),
            'active'            => $this -> faker -> boolean(),
            'created_at'        => Carbon ::now(),
            'updated_at'        => Carbon ::now(),
        ];
    }
}
