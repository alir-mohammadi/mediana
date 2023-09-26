<?php

namespace Database\Factories;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FeedbackFactory extends Factory
{

    protected $model = Feedback::class;

    public function definition(): array
    {
        return [
            'call_id'    => $this -> faker -> word(),
            'meta'       => $this -> faker -> words(),
            'creator'    => $this -> faker -> word(),
            'created_at' => Carbon ::now(),
            'updated_at' => Carbon ::now(),
        ];
    }
}
