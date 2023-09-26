<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema ::create('feedback', function (Blueprint $table) {
            $table -> id();
            $table -> string('call_id');
            $table -> json('meta');
            $table -> string('creator');
            $table -> softDeletes();
            $table -> timestamps();
        });
    }

    public function down(): void
    {
        Schema ::dropIfExists('feedback');
    }
};
