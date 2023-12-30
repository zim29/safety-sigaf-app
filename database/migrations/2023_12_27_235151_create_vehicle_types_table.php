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
        Schema::create('vehicle_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('creator_id')->nullable()->constrained(table: 'users')->restrictOnDelete();
            $table->foreignId('updater_id')->nullable()->constrained(table: 'users')->restrictOnDelete();
            $table->foreignId('deleter_id')->nullable()->constrained(table: 'users')->restrictOnDelete();
        });

        Schema::table('vehicles', function (Blueprint $table) {
            $table->foreign('vehicle_type_id')
                    ->on('vehicle_types')
                    ->references('id')
                    ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropForeign(['vehicle_type_id']);
        });
        Schema::dropIfExists('vehicle_types');
    }
};
