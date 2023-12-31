<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema ::create('packages', function (Blueprint $table) {
            $table -> id();
            $table -> string('type');
            $table -> string('price');
            $table -> integer('duration');
            $table -> integer('seconds');
            $table -> softDeletes();
            $table -> timestamps();
        });
    }

    public function down(): void
    {
        Schema ::dropIfExists('packages');
    }
};
