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
        Schema::create('contract_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('role_id')->nullable();

            $table->foreign('user_id')
                        ->on('users')
                        ->references('id')
                        ->restrictOnDelete();

            $table->foreign('company_id')
                        ->on('companies')
                        ->references('id')
                        ->restrictOnDelete();

            $table->foreign('role_id')
                        ->on('roles')
                        ->references('id')
                        ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_information');
    }
};
