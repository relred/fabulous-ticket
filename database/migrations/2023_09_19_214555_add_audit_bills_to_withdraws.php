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
            $table->string('one_thousand_bills')->nullable();
            $table->string('five_hundred_bills')->nullable();
            $table->string('two_hundred_bills')->nullable();
            $table->string('one_hundred_bills')->nullable();
            $table->string('fifty_bills')->nullable();
            $table->string('twenty_bills')->nullable();
            $table->string('coins')->nullable();
            $table->string('dollars')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('withdraws', function (Blueprint $table) {
            $table->dropColumn('one_thousand_bills'); 
            $table->dropColumn('five_hundred_bills'); 
            $table->dropColumn('two_hundred_bills'); 
            $table->dropColumn('one_hundred_bills'); 
            $table->dropColumn('fifty_bills'); 
            $table->dropColumn('twenty_bills'); 
            $table->dropColumn('coins'); 
            $table->dropColumn('dollars'); 
        });
    }
};
