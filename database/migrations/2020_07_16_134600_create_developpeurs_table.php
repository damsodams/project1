<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeveloppeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developpeurs', function (Blueprint $table) {
            $table->id();
            $table->string('competence');
            $table->string('cv');
            $table->string('photo');
            $table->string('adresse');
            $table->string('ville');
            $table->integer('code_postal');
            $table->string('telephone');
            $table->DateTime('date_naissance');
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
        Schema::dropIfExists('developpeurs');
    }
}
