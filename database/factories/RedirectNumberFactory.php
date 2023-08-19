<?php

namespace Database\Factories;

use App\Models\RedirectNumber;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RedirectNumberFactory extends Factory
{
    protected $model = RedirectNumber::class;

    public function definition(): array
    {
        return [
            'number' => $this->faker->randomNumber(),
            'phone_number_id' => $this->faker->phoneNumber(),
            'redirect_phone_number' => $this->faker->phoneNumber(),
            'backup_redirect_phone_number' => $this->faker->phoneNumber(),
            'active' => $this->faker->boolean(),
            'title' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
