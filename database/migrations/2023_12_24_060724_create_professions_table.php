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
        Schema::create('professions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('creator_id');
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

        Schema::table( 'users', function ( Blueprint $table ) {
            $table->foreign('profession_id')
                        ->on('professions')
                        ->references('id')
                        ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table( 'professions', function ( Blueprint $table ) {
            $table->dropForeign(['creator_id']);
            $table->dropForeign(['updater_id']);
            $table->dropForeign(['deleter_id']);
        });

        Schema::table( 'users', function ( Blueprint $table ) {
            $table->dropForeign(['profession_id']);
        });

        Schema::dropIfExists('professions');
    }
};
