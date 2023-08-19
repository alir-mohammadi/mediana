<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('phone_numbers', static function (Blueprint $table) {
            $table->id();
            $table->string('phone_number');
            $table->foreignId('owner_id')->constrained('users');
            $table->boolean('active')->default(true);
            $table->string('package')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('phone_numbers');
    }
};
