<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema ::table('user_packages', function (Blueprint $table) {
            $table->dropColumn('remaining_seconds');
            $table->integer('remaining_incoming_seconds')->default(0);
            $table->integer('remaining_outgoing_seconds')->default(0);
        });
    }

    public function down(): void
    {
        Schema ::table('user_packages', function (Blueprint $table) {
            //
        });
    }
};
