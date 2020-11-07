<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {

            $table->increments('id')->index();
            $table->string('raison_social',100);
            $table->string('activite')->nullable();
            $table->string('adresse1', 70);
            $table->string('adresse2', 50)->nullable();
            $table->string('code_postal');
            $table->string('ville',50);
            $table->string('pays',100)->default('France');
            $table->string('telephone_fixe')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

            $table->integer('user_id')->unsigned();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
}
