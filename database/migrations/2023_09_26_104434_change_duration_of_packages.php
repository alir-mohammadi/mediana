<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema ::table('packages', function (Blueprint $table) {
            $table->dropColumn('seconds');
            $table->integer('incoming_seconds')->default(0);
            $table->integer('outgoing_seconds')->default(0);
        });
    }

    public function down(): void
    {
        Schema ::table('packages', function (Blueprint $table) {
            //
        });
    }
};
