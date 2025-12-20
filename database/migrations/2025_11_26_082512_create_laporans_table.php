<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('Asrama');
            
            // 12 Bulan Masehi
            $table->integer('januari')->default(0);
            $table->integer('februari')->default(0);
            $table->integer('maret')->default(0);
            $table->integer('april')->default(0);
            $table->integer('mei')->default(0);
            $table->integer('juni')->default(0);
            $table->integer('juli')->default(0);
            $table->integer('agustus')->default(0);
            $table->integer('september')->default(0);
            $table->integer('oktober')->default(0);
            $table->integer('november')->default(0);
            $table->integer('desember')->default(0);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};