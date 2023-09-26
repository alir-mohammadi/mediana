<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema ::create('verification_codes', function (Blueprint $table) {
            $table -> id();
            $table -> string('user_id');
            $table -> string('otp');
            $table -> string('expire_at');
            $table -> softDeletes();
            $table -> timestamps();
        });
    }

    public function down(): void
    {
        Schema ::dropIfExists('verification_codes');
    }
};
