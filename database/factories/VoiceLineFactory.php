<?php

namespace Database\Factories;

use App\Models\VoiceLine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class VoiceLineFactory extends Factory
{

    protected $model = VoiceLine::class;

    public function definition(): array
    {
        return [
            'type'            => $this -> faker -> word(),
            'name'            => $this -> faker -> name(),
            'phone_number_id' => $this -> faker -> phoneNumber(),
            'created_at'      => Carbon ::now(),
            'updated_at'      => Carbon ::now(),
        ];
    }
}
