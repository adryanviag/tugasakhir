<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsiDisposisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isi_disposisis', function (Blueprint $table) {
            $table->string('Kode', 4);
            $table->string('Isi', 50);
        });

        Schema::rename('isi_disposisis', 'tbisidisposisi');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isi_disposisis');
    }
}
