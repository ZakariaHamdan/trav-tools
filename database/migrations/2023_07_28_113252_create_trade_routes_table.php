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
        Schema::create('trade_routes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('from_village_id');
            $table->bigInteger('to_village_id');
            $table->bigInteger('lumber');
            $table->bigInteger('clay');
            $table->bigInteger('iron');
            $table->bigInteger('crop');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_routes');
    }
};
