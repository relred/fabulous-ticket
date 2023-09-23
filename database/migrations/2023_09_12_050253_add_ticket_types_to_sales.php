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
        Schema::table('sales', function (Blueprint $table) {
            $table->string('adult')->nullable();
            $table->string('kid')->nullable();
            $table->string('senior')->nullable();
            $table->string('disabled')->nullable();
            $table->string('birthday')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('adult'); 
            $table->dropColumn('kid'); 
            $table->dropColumn('senior'); 
            $table->dropColumn('disabled'); 
            $table->dropColumn('birthday'); 
        });
    }
};
