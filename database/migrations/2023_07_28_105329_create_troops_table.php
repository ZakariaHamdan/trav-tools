<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('troops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tribe');
            $table->integer('lumber');
            $table->integer('clay');
            $table->integer('iron');
            $table->integer('crop');
            $table->integer('upkeep')->default(1);
            $table->integer('speed')->nullable();
            $table->integer('train_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('troops');
    }
};
