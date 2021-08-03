<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtinguidorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extinguidors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo')->required();
            $table->enum('tipo', ['Polvo_Seco', 'CO2','Agua'])->required();
            $table->double('peso', 8, 2)->required();
            $table->string('presurizado')->required();
            $table->string('proveedor')->required();
            $table->string('imagen')->required();
            $table->string('area')->required();
            $table->string('ubicacion')->required();
            $table->date('fecha_recarga')->required();
            $table->date('fecha_prox_recarga')->required();


            $table->enum('estado', ['true', 'false'])->nullable();;
            $table->enum('precinto', ['true', 'false'])->nullable();;
            $table->enum('chaveta', ['true', 'false'])->nullable();;
            $table->enum('percutado', ['true', 'false'])->nullable();;
            $table->enum('acceso', ['true', 'false'])->nullable();;
            $table->longText('observaciones')->nullable();
            $table->string('user')->nullable();

            $table->unsignedBigInteger('planta_id')->unsigned();
            $table->foreign('planta_id')->references('id')->on('plantas')
                ->onDelete('cascade');
            
            $table->unsignedBigInteger('categorias_id')->unsigned();
            $table->foreign('categorias_id')->references('id')->on('categorias')
                ->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extinguidors');
    }
}
