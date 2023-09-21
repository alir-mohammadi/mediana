<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema ::create('user_packages', function (Blueprint $table) {
            $table -> id();
            $table -> integer('user_id');
            $table -> integer('package_id');
            $table -> integer('remaining_seconds');
            $table -> timestamp('expire_at');
            $table -> timestamp('started_at');
            $table -> boolean('active');
            $table -> softDeletes();
            $table -> timestamps();
        });
    }

    public function down(): void
    {
        Schema ::dropIfExists('user_packages');
    }
};
