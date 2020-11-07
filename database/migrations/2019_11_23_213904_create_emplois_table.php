<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emplois', function (Blueprint $table) {
            $table->increments('id');
            $table->string('intitule');
            $table->string('description');
            $table->string('contexte');
            $table->string('taches');
            $table->string('technologies');
            $table->integer('salaireAnnuel');
            $table->integer('salaireAutre');
            $table->string('ville');
            $table->integer('entreprise_id')->unsigned();
            $table->integer('employee_id')->unsigned();
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
        Schema::dropIfExists('emplois');
    }
}
