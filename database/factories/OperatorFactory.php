<?php

namespace Database\Factories;

use App\Models\Operator;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OperatorFactory extends Factory
{

    protected $model = Operator::class;

    public function definition(): array
    {
        return [
            'phone_number'    => $this -> faker -> phoneNumber(),
            'phone_number_id' => $this -> faker -> phoneNumber(),
            'name'            => $this -> faker -> name(),
            'active'          => $this -> faker -> boolean(),
            'outgoing_access' => $this -> faker -> boolean(),
            'created_at'      => Carbon ::now(),
            'updated_at'      => Carbon ::now(),
        ];
    }
}
