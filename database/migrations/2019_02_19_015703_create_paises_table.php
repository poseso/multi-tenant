<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaisesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (! Schema::hasTable('paises')) {
            Schema::create('paises', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('codigo');
                $table->string('iso');
                $table->string('descripcion');
                $table->string('nacionalidad');
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
        Schema::dropIfExists('paises');
    }
}
