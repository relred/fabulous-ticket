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
            $table->string('user_fullname')->nullable();
            $table->string('stall')->nullable();
            $table->string('state')->nullable();
            $table->string('scanned_at')->nullable();
            $table->string('cancelled_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('user_fullname'); 
            $table->dropColumn('stall'); 
            $table->dropColumn('state'); 
            $table->dropColumn('scanned_at'); 
            $table->dropColumn('cancelled_by'); 
        });
    }
};
