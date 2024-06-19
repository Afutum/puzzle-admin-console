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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name', 20);   // item_nameカラム
            $table->string('type', 20);        // typeカラム
            $table->integer('effect_num'); // effect_numカラム
            $table->string('explanation', 50); // explanationカラム
            $table->timestamps();

            $table->unique('item_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
