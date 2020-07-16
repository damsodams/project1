<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulerOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postuler__offres', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('offre_id')->unsigned();
            $table->bigInteger('developpeur_id')->unsigned();
            $table->enum('type_contrat', array ('0' , '1' , '2' , "3"))->default('0');
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
        Schema::dropIfExists('postuler__offres');
    }
}
