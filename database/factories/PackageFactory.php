<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PackageFactory extends Factory
{

    protected $model = Package::class;

    public function definition(): array
    {
        return [
            'type'       => $this -> faker -> word(),
            'price'      => $this -> faker -> word(),
            'duration'   => $this -> faker -> randomNumber(),
            'seconds'    => $this -> faker -> randomNumber(),
            'created_at' => Carbon ::now(),
            'updated_at' => Carbon ::now(),
        ];
    }
}
