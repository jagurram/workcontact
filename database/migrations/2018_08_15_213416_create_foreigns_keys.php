<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignsKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('employees', function(Blueprint $table) {
//            $table->foreign('contact_id')->references('id')->on('contact')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//
//            $table->foreign('entreprise_id')->references('id')->on('entreprise')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//        });
//
//        Schema::table('entreprises', function(Blueprint $table) {
//            $table->foreign('user_id')->references('id')->on('users')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//        });
//
//        Schema::table('contacts', function(Blueprint $table) {
//            $table->foreign('user_id')->references('id')->on('users')
//                ->onDelete('restrict')
//                ->onUpdate('restrict');
//        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('employees', function(Blueprint $table) {
//            $table->dropForeign('employees_contact_id_foreign');
//            $table->dropForeign('employees_entreprise_id_foreign');
//        });
//
//        Schema::table('entreprises', function(Blueprint $table) {
//            $table->dropForeign('entreprises_user_id_foreign');
//
//        });
//
//        Schema::table('contacts', function(Blueprint $table) {
//            $table->dropForeign('contacts_user_id_foreign');
//        });
    }
}
