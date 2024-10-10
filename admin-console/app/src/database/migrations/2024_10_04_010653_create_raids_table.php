<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('raids', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('boss_id');
            $table->integer('boss_hp');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('raids');
    }
};
