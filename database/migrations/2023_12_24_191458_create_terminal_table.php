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
        Schema::create('terminals', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->unsignedBigInteger('station_id');
            $table->unsignedBigInteger('system_id');
            $table->string('long');
            $table->string('lat');
            $table->string('add_line_1')->comment('Address Line 1');
            $table->string('add_line_2')->comment('Address Line 2');
            $table->unsignedBigInteger('city_id');
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

            $table->foreign('city_id')
                        ->on('cities')
                        ->references('id')
                        ->restrictOnDelete();

            $table->foreign('station_id')
                        ->on('stations')
                        ->references('id')
                        ->restrictOnDelete();

            $table->foreign('system_id')
                        ->on('systems')
                        ->references('id')
                        ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terminals');
    }
};
