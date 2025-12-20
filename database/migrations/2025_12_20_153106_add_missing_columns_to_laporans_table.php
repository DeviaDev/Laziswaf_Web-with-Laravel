<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Cek kolom mana yang ada
        $columns = Schema::getColumnListing('laporans');
        
        Schema::table('laporans', function (Blueprint $table) use ($columns) {
            // Tambah kolom Masehi yang belum ada
            if (!in_array('januari', $columns)) {
                $table->integer('januari')->default(0)->after('Asrama');
            }
            if (!in_array('februari', $columns)) {
                $table->integer('februari')->default(0)->after('januari');
            }
            if (!in_array('maret', $columns)) {
                $table->integer('maret')->default(0)->after('februari');
            }
            if (!in_array('april', $columns)) {
                $table->integer('april')->default(0)->after('maret');
            }
            if (!in_array('mei', $columns)) {
                $table->integer('mei')->default(0)->after('april');
            }
            if (!in_array('juni', $columns)) {
                $table->integer('juni')->default(0)->after('mei');
            }
            if (!in_array('juli', $columns)) {
                $table->integer('juli')->default(0)->after('juni');
            }
            if (!in_array('agustus', $columns)) {
                $table->integer('agustus')->default(0)->after('juli');
            }
            if (!in_array('september', $columns)) {
                $table->integer('september')->default(0)->after('agustus');
            }
            if (!in_array('oktober', $columns)) {
                $table->integer('oktober')->default(0)->after('september');
            }
            if (!in_array('november', $columns)) {
                $table->integer('november')->default(0)->after('oktober');
            }
            if (!in_array('desember', $columns)) {
                $table->integer('desember')->default(0)->after('november');
            }
        });
        
        // Hapus kolom Hijriyah kalau masih ada
        Schema::table('laporans', function (Blueprint $table) use ($columns) {
            $hijriColumns = ['shafar', 'rabiul_awal', 'rabiul_akhir', 'jumadil_awal', 
                             'jumadil_akhir', 'rajab', 'syaban', 'ramadhan', 'syawwal', 'dzulqodah'];
            
            foreach ($hijriColumns as $col) {
                if (in_array($col, $columns)) {
                    $table->dropColumn($col);
                }
            }
        });
    }

    public function down(): void
    {
        Schema::table('laporans', function (Blueprint $table) {
            $table->dropColumn(['januari', 'februari', 'maret', 'april', 'mei', 'juni', 
                               'juli', 'agustus', 'september', 'oktober', 'november', 'desember']);
        });
    }
};