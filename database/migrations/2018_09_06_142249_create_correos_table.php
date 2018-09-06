<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorreosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('correo')->unique();
            $table->string('clave');
            $table->string('nombre');
            $table->string('cargo')->nullable();
            $table->string('unidad')->nullable();
            $table->string('entrega')->comment('si/no');
            $table->dateTime('fecha_activacion')->nullable();
            $table->dateTime('fecha_desactivacion')->nullable();
            $table->integer('activo')->nullable();
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('correos');
    }
}
