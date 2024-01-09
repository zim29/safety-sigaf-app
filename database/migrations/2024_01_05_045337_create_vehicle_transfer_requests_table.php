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
        Schema::create('vehicle_transfer_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->contrained()->restrictOnDelete();
            $table->foreignId('from_company_id')->contrained(table: 'companies')->restrictOnDelete();
            $table->foreignId('to_company_id')->contrained(table: 'companies')->restrictOnDelete();
            $table->enum('status', ['in_process', 'approved_by_user', 'rejected_by_user', 'rejected_by_system'])->default('in_process');
            $table->string('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_transfer_requests');
    }
};
