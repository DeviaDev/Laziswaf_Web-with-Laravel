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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('Asrama');

    $table->integer('shafar')->default(0);
    $table->integer('rabiul_awal')->default(0);
    $table->integer('rabiul_akhir')->default(0);
    $table->integer('jumadil_awal')->default(0);
    $table->integer('jumadil_akhir')->default(0);
    $table->integer('rajab')->default(0);
    $table->integer('syaban')->default(0);
    $table->integer('ramadhan')->default(0);
    $table->integer('syawwal')->default(0);
    $table->integer('dzulqodah')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
