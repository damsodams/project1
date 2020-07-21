<?php

use Illuminate\Database\Seeder;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('entreprises')->insert([
      'nom'=> 'Lacoste',
      'logo'=> 'img/lacost.jpg',
      'siret'=> '1 Place Giovanni da Verrazzano',
      'adresse'=> '1 Place Giovanni da Verrazzano',
      'ville' => 'lyon',
      'code_postal' => '345678',
      'telephone' => '23456789',
      'secteur_activité' => 'domotique',
      'nb_salarie' => '16',
    ]);
    }
}
