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
        Schema::create('user_ac_reqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('terminal_id')->constrained()->restrictOnDelete();
            $table->foreignId('company_id')->constrained()->restrictOnDelete();
            $table->foreignId('vehicle_id')->nullable()->constrained()->restrictOnDelete();
            $table->string('comments');
            $table->string('areas');
            $table->enum('status', ['created', 
                                                'approved_by_head','approved_by_coordinator', 
                                                'rejected_by_head','rejected_by_coordinator',
                                    ]);
            $table->foreignUuid('requester_auth')->constrained(
                                                        table: 'authorizations', column: 'uuid'
                                                    )->restrictOnDelete();
            $table->foreignUuid('head_auth')->nullable()->constrained(
                                                        table: 'authorizations', column: 'uuid'
                                                    )->restrictOnDelete();
            $table->foreignUuid('coordinator_auth')->nullable()->constrained(
                                                        table: 'authorizations', column: 'uuid'
                                                    )->restrictOnDelete();  
            $table->timestamps();        

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_ac_reqs');
    }
};
