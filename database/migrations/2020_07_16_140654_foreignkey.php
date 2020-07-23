<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Foreignkey extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('offres', function (Blueprint $table) {
      $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');
    });
    Schema::table('diplomes', function (Blueprint $table) {
      $table->foreign('developpeur_id')->references('id')->on('developpeurs')->onDelete('cascade');
    });
    Schema::table('postuler__offres', function (Blueprint $table) {
      $table->foreign('offre_id')->references('id')->on('offres')->onDelete('cascade');
      $table->foreign('developpeur_id')->references('id')->on('developpeurs')->onDelete('cascade');
    });
    Schema::table('users', function (Blueprint $table) {
      $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');
      $table->foreign('developpeur_id')->references('id')->on('developpeurs')->onDelete('cascade');
      $table->foreign('administrateur_id')->references('id')->on('administrateurs')->onDelete('cascade');
    });
    Schema::table('messages', function (Blueprint $table) {
      $table->foreign('emetteur')->references('id')->on('developpeurs')->onDelete('cascade');
      $table->foreign('destinataire')->references('id')->on('entreprises')->onDelete('cascade');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    //
  }
}
