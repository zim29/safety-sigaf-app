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
        Schema::create('vehicle_ac_reqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('terminal_id');
            $table->text('comments');
            $table->boolean('requires_risk_validation');
            $table->char('requester_auth', 36);
            $table->char('risk_validation_auth', 36)->nullable();
            $table->char('head_auth', 36)->nullable();
            $table->char('coordinator_auth', 36)->nullable();
            $table->enum('status', ['created', 
                                                'approved_by_risk', 'approved_by_head','approved_by_coordinator', 
                                                'rejected_by_risk', 'rejected_by_head','rejected_by_coordinator',
                                    ]);
            $table->timestamps();

            $table->foreign('company_id')
                    ->references('id')
                    ->on('companies')
                    ->restrictOnDelete();

            $table->foreign('terminal_id')
                    ->references('id')
                    ->on('terminals')
                    ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_ac_reqs');
    }
};
