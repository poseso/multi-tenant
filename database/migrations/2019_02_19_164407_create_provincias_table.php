<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (! Schema::hasTable('provincias')) {
            Schema::create('provincias', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedInteger('pais_id');
                $table->string('descripcion');
                $table->boolean('activo')->default(true);
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('provincias');
    }
}
