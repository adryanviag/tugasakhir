<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->string('KdUnit', 6)->default(0);
            $table->string('KdLokasi', 6)->primary();
            $table->string('Desk', 35);
        });

        Schema::rename('locations', 'tblokasi');
        DB::statement('ALTER TABLE tblokasi DROP PRIMARY KEY, ADD PRIMARY KEY (KdUnit, KdLokasi)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
