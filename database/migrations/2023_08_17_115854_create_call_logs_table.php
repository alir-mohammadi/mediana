<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('call_logs', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('phone_number')->constrained('phone_numbers');
            $table->json('meta_data')->nullable();
            $table->string('from');
            $table->string('duration');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('call_logs');
    }
};
