<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema ::table('phone_numbers', function (Blueprint $table) {
            $table->json('allowed_numbers')->nullable();
        });
    }

    public function down(): void
    {
        Schema ::table('phone_numbers', function (Blueprint $table) {
            //
        });
    }
};
