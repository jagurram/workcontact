<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->nullable();
            $table->datetime('dateEvenement')->nullable();
            $table->date('dateDebut')->nullable();
            $table->date('dateFin')->nullable();
            $table->text('commentaire')->nullable();
            $table->string('categorie')->nullable();
            $table->string('sous_categorie')->nullable();
            $table->string('mode_contact')->nullable();
            $table->integer('dossier_id')->unsigned();
            $table->boolean('isClosed')->nullable();
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
        Schema::dropIfExists('activites');
    }
}
