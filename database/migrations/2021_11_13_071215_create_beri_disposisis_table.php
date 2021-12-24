<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBeriDisposisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beri_disposisis', function (Blueprint $table) {
            $table->string('KdUnit', 10);
            $table->string('KdUnitSurat', 10);
            $table->string('NoAgendaSurat', 30);
            $table->string('TglDisposisi', 11);
            $table->string('Penerima', 10);
            $table->string('Isi', 10);
            $table->string('Catatan', 150)->nullable();
        });

        Schema::rename('beri_disposisis', 'tbberidisposisi');
        DB::statement('ALTER TABLE tbberidisposisi ADD PRIMARY KEY (KdUnit, KdUnitSurat, NoAgendaSurat, Penerima)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beri_disposisis');
    }
}
