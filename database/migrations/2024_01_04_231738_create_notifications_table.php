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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId( 'user_id' )->constrained()->cascadeOnDelete();
            $table->enum( 'notification_type', [ 'user_access_request', 'vehicle_access_request', 'emergency', 'vehicle_trasnfer_request', 'vehicle_transfer_approved'] );
            $table->foreignId( 'request_id' );
            $table->boolean( 'readed' )->default( false )->comment( 'Says that notification is readed on true or not on false' );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
