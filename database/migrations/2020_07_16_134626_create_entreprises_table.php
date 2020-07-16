<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
          $table->id();
          $table->string('nom');
          $table->string('logo');
          $table->string('siret');
          $table->string('adresse');
          $table->string('ville');
          $table->integer('code_postal');
          $table->integer('telephone');
          $table->string('secteur_activité');
          $table->integer('nb_salarie');
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
        Schema::dropIfExists('entreprises');
    }
}
