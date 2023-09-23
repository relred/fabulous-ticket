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
        Schema::table('withdraws', function (Blueprint $table) {
            $table->string('ten_coins')->nullable();
            $table->string('five_coins')->nullable();
            $table->string('two_coins')->nullable();
            $table->string('one_coins')->nullable();
            $table->string('cash_in_register')->nullable();
            $table->string('dollars_in_register')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('withdraws', function (Blueprint $table) {
            $table->dropColumn('ten_coins'); 
            $table->dropColumn('five_coins'); 
            $table->dropColumn('two_coins'); 
            $table->dropColumn('one_coins'); 
            $table->dropColumn('cash_in_register'); 
            $table->dropColumn('dollars_in_register'); 
        });
    }
};
