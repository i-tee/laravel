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
        Schema::table('developers', function (Blueprint $table) {
            
            $table->string('profession')->nullable();
            $table->string('telegram_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('email')->nullable();
            $table->date('experiencedate')->nullable();
            $table->date('birthdate')->nullable();
            $table->text('education')->nullable();  

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('developers', function (Blueprint $table) {
            
            $table->dropColumn(['profession', 'telegram_url', 'github_url', 'email', 'experiencedate', 'birthdate', 'education']);

        });
    }
};
