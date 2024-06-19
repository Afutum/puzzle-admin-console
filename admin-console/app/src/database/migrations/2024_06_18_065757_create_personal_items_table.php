<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_items', function (Blueprint $table) {
            $table->id();
            $table->integer('player_id');     // プレイヤーのid
            $table->integer('item_id');       // アイテムのid
            $table->integer('personal_item'); // アイテムの所持数
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_items');
    }
};
