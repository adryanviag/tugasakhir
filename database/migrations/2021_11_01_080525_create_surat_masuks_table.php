<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->string('KdUnit', 6)->default(0);
            $table->string('NoAgenda', 35)->primary();
            $table->string('Pengirim', 10);
            $table->string('TglDiterima', 11);
            $table->string('SifatSurat', 7);
            $table->string('StatusSurat', 10);
            $table->string('Lokasi', 6);
            $table->string('Klas', 6);
            $table->string('TglSurat', 11);
            $table->string('NoSurat', 30);
            $table->string('Lamp', 15);
            $table->string('IsiRingkas', 200);
            $table->string('TglHrsSelesai', 11);
            $table->string('Catatan', 200);
            $table->string('MasaAktif', 11)->default(0);
            $table->string('MasaInAktif', 11)->default(0);
            $table->string('LokasiMedia', 80);
            $table->string('LokasiFisik', 7)->default(0);
        });

        Schema::rename('surat_masuks', 'tbmasuk');
        DB::statement('ALTER TABLE tbmasuk DROP PRIMARY KEY, ADD PRIMARY KEY (KdUnit, NoAgenda)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuks');
    }
}
