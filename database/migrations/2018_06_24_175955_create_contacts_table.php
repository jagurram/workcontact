<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('prenom',50);
            $table->string('nom', 50);
            $table->string('photo')->nullable();
            $table->string('origine', 50)->nullable();
            $table->string('fonction');
            $table->string('adresse')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('ville',50)->nullable();
            $table->string('pays',100)->default('France');
            $table->string('email')->nullable();
            $table->string('telephone_fixe')->nullable();
            $table->string('telephone_mobile')->nullable();

            $table->mediumText('commentaire')->nullable();
            $table->integer('user_id')->unsigned();

            $table->string('skills')->nullable();
            $table->string('education')->nullable();

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
        Schema::dropIfExists('contacts');
    }
}
