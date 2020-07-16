<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Foreignekeye extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //
      Schema::table('entreprise', function (Blueprint $table) {
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

      });
      Schema::table('dev', function (Blueprint $table) {
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

      });
      Schema::table('postuler', function (Blueprint $table) {
          $table->foreign('entreprise_id')->references('id')->on('entreprise')->onDelete('cascade');

      });
      Schema::table('postuler', function (Blueprint $table) {
          $table->foreign('dev_id')->references('id')->on('dev')->onDelete('cascade');
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
