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
        Schema::table('announced_pu_results', function (Blueprint $table) {
            $table->string('entered_by_user')->nullable()->change();
            $table->string('date_entered')->nullable()->change();
            $table->string('user_ip_address')->nullable()->change();
            //This adds the created_at & updated_at fields to the table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announced_pu_results', function (Blueprint $table) {
            //
        });
    }
};
