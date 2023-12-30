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
            $table->string('t_placard', 10)->nullable()->unique()->comment('Trailer Placard');
            $table->foreignId('color_id')->constrained()->restrictOnDelete();
            $table->foreignId('vehicle_type_id');
            $table->foreignId('vehicle_brand_id')->constrained()->restrictOnDelete();
            $table->foreignId('company_id')->constrained()->restrictOnDelete();
            $table->string('model', 30);
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('creator_id')->nullable()->constrained(table: 'users')->restrictOnDelete();
            $table->foreignId('updater_id')->nullable()->constrained(table: 'users')->restrictOnDelete();
            $table->foreignId('deleter_id')->nullable()->constrained(table: 'users')->restrictOnDelete();

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
