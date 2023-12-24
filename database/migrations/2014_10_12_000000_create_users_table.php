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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->unsignedBigInteger('document_type_id');
            $table->string('document_number', 30)->unique();
            $table->string('phone_number', 20);
            $table->date('dob')->comment('Date of birth');
            $table->unsignedBigInteger('profession_id');
            $table->unsignedBigInteger('brigade_id');
            $table->unsignedBigInteger('gender_id');
            $table->string('em_co_name', 100)->comment('Emergency contact name');
            $table->string('em_co_phone', 30)->comment('Emergency contact phone');
            $table->string('allergies')->nullable();
            $table->unsignedBigInteger('blood_type_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('c_terminal_id')
                                ->nullable()
                                ->comment('Current Terminal ID');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
