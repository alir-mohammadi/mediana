<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('redirect_numbers', static function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->foreignId('phone_number_id')->constrained('phone_numbers');
            $table->string('redirect_phone_number');
            $table->string('backup_redirect_phone_number')->nullable();
            $table->boolean('active')->default(true);
            $table->string('title')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('redirect_numbers');
    }
};
