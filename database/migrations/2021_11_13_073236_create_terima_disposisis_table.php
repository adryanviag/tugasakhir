<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTerimaDisposisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terima_disposisis', function (Blueprint $table) {
            $table->string('KdUnit', 10);
            $table->string('KdUnitSurat', 10);
            $table->string('NoAgendaSurat', 30);
            $table->string('TglDiterima', 11);
            $table->string('Pengirim', 10);
            $table->string('YgDilakukan', 50);
            $table->string('Status', 20)->nullable();
            $table->string('TglStatus', 11)->nullable();
        });

        Schema::rename('terima_disposisis', 'tbterimadisposisi');
        DB::statement('ALTER TABLE tbterimadisposisi ADD PRIMARY KEY (KdUnit, KdUnitSurat, NoAgendaSurat)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terima_disposisis');
    }
}
