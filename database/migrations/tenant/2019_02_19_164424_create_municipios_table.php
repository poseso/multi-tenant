<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (! Schema::hasTable('municipios')) {
            Schema::create('municipios', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedInteger('pais_id');
                $table->unsignedInteger('provincia_id');
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
        Schema::dropIfExists('municipios');
    }
}
