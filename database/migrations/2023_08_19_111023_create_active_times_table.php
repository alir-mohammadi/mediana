<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema ::create('active_times', function (Blueprint $table) {
            $table -> id();
            $table -> string('from_day');
            $table -> string('to_day');
            $table -> string('from_time');
            $table -> string('to_time');
            $table -> foreignId('phone_number_id')->constrained();
            $table -> softDeletes();
            $table -> timestamps();
        });
    }

    public function down(): void
    {
        Schema ::dropIfExists('active_times');
    }
};
