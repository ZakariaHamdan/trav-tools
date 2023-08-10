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
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('x')->nullable();
            $table->integer('y')->nullable();
            $table->bigInteger('user_id')->default(0);
            $table->bigInteger('lumber')->default(0);
            $table->bigInteger('clay')->default(0);
            $table->bigInteger('iron')->default(0);
            $table->bigInteger('crop')->default(0);
            $table->bigInteger('net_lumber')->default(0);
            $table->bigInteger('net_clay')->default(0);
            $table->bigInteger('net_iron')->default(0);
            $table->bigInteger('net_crop')->default(0);
            $table->bigInteger('needed_lumber')->default(0);
            $table->bigInteger('needed_clay')->default(0);
            $table->bigInteger('needed_iron')->default(0);
            $table->bigInteger('needed_crop')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villages');
    }
};
