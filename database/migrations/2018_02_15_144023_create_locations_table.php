<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            //FK DO CLIENTE
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')
                        ->references('id')
                        ->on('clients')
                        ->onDelete('cascade');

            //FK DO CARRO
            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')
                        ->references('id')
                        ->on('cars')
                        ->onDelete('cascade');

            //COLUNAS DA TABELA LOCAÇÃO
            $table->integer('value')->default(0);
            $table->date('date');
            $table->date('devolution');
            $table->date('delivery');
            $table->integer('status');
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
        Schema::dropIfExists('locations');
    }
}
