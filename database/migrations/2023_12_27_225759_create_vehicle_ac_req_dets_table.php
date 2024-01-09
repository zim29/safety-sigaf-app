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
        Schema::create('vehicle_ac_req_dets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_ac_req_id');
            $table->unsignedBigInteger('vehicle_id');   
            $table->date('request_from'); 
            $table->date('request_until');    

            $table->foreign('vehicle_ac_req_id')
                    ->references('id')
                    ->on('vehicle_ac_reqs')
                    ->cascadeOnDelete();

            $table->foreign('vehicle_id')
                    ->references('id')
                    ->on('vehicles')
                    ->restrictOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_ac_req_dets');
    }
};
