<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema ::create('operators',static function (Blueprint $table) {
            $table -> id();
            $table -> string('phone_number');
            $table -> foreignId('phone_number_id')->constrained('phone_numbers');
            $table -> string('name');
            $table -> boolean('active')->default(true);
            $table -> boolean('outgoing_access')->default(true);
            $table -> softDeletes();
            $table -> timestamps();
        });
    }

    public function down(): void
    {
        Schema ::dropIfExists('operators');
    }
};
