<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siti_aminah_ups', function (Blueprint $table) {
            $table->unsignedBigInteger('laporan_id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('siti_aminah_ups', function (Blueprint $table) {
            $table->dropColumn('laporan_id');
        });
    }
};