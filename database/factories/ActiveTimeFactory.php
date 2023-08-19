<?php

namespace Database\Factories;

use App\Models\ActiveTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ActiveTimeFactory extends Factory
{

    protected $model = ActiveTime::class;

    public function definition(): array
    {
        return [
            'from_day'   => $this -> faker -> word(),
            'to_day'     => $this -> faker -> word(),
            'from_time'  => $this -> faker -> word(),
            'to_time'    => $this -> faker -> word(),
            'created_at' => Carbon ::now(),
            'updated_at' => Carbon ::now(),
        ];
    }
}
