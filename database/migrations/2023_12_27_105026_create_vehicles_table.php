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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('placard', 10)->unique();
            $table->string('t_placard', 10)->unique()->comment('Trailer Placard');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('vehicle_brand_id');
            $table->unsignedBigInteger('company_id');
            $table->string('model', 30);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->unsignedBigInteger('updater_id')->nullable();
            $table->unsignedBigInteger('deleter_id')->nullable();

            $table->foreign('creator_id')
                        ->on('users')
                        ->references('id')
                        ->restrictOnDelete();

            $table->foreign('updater_id')
                        ->on('users')
                        ->references('id')
                        ->restrictOnDelete();

            $table->foreign('deleter_id')
                        ->on('users')
                        ->references('id')
                        ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
