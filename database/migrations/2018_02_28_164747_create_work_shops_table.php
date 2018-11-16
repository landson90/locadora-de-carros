<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_shops', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')
                        ->references('id')
                        ->on('cars')
                        ->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade');

            $table->string('problem', 50);
            $table->integer('status')->default(0);
            $table->date('entry');
            $table->date('exit');
            $table->text('description');
            
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
        Schema::dropIfExists('work_shops');
    }
}
