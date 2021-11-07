<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instances', function (Blueprint $table) {
            $table->string('kode', 10)->primary();
            $table->string('kdunit', 10)->default(0);
            $table->string('instansi', 80);
            $table->string('kontak', 35)->nullable(true);
            $table->string('alamat', 80)->nullable(true);
            $table->string('kota', 40)->nullable(true);
            $table->string('kodepos', 10)->nullable(true);
            $table->string('telpon', 14)->nullable(true);
            $table->string('fax', 14)->nullable(true);
            $table->string('email', 25)->nullable(true);
            $table->string('web', 50)->nullable(true);
            // $table->timestamps();
        });

        Schema::rename('instances', 'tbinstansi');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instances');
    }
}
