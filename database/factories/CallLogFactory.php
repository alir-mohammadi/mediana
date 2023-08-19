<?php

namespace Database\Factories;

use App\Models\CallLog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CallLogFactory extends Factory
{
    protected $model = CallLog::class;

    public function definition(): array
    {
        return [
            'phone_number' => $this->faker->phoneNumber(),
            'meta_data' => $this->faker->words(),
            'from' => $this->faker->word(),
            'duration' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
