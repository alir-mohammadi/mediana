<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema ::table('user_packages', function (Blueprint $table) {
            $table->rename('package_user');
        });
    }

    public function down(): void
    {
        Schema ::table('user_packages', function (Blueprint $table) {
            //
        });
    }
};
