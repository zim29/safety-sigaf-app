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
        Schema::table('users', function (Blueprint $table) {
            $table->text('token_secret')
                ->after('password')
                ->nullable();

            $table->text('token_recovery_codes')
                ->after('token_secret')
                ->nullable();

            $table->timestamp('token_confirmed_at')
                    ->after('token_recovery_codes')
                    ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'token_secret',
                'token_recovery_codes',
                'token_confirmed_at',
            ]));
        });
    }
};
