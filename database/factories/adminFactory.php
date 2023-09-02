<?php

namespace Database\Factories;

use App\Models\admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class adminFactory extends Factory
{

    protected $model = admin::class;

    public function definition(): array
    {
        return [
            'name'       => $this -> faker -> name(),
            'user_name'  => $this -> faker -> userName(),
            'password'   => bcrypt($this -> faker -> password()),
            'created_at' => Carbon ::now(),
            'updated_at' => Carbon ::now(),
        ];
    }
}
