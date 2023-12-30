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
        Schema::create('document_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('regex', 50);
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('creator_id')->nullable()->constrained( table: 'users');
            $table->foreignId('updater_id')->nullable()->constrained( table: 'users');
            $table->foreignId('deleter_id')->nullable()->constrained( table: 'users');
        });

        Schema::table( 'users', function ( Blueprint $table ) {
            $table->foreign('document_type_id')
                        ->on('document_types')
                        ->references('id')
                        ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table( 'users', function ( Blueprint $table ) {
            $table->dropForeign(['document_type_id']);
        });

        Schema::dropIfExists('document_types');
    }
};
