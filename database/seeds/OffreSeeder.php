<?php

use Illuminate\Database\Seeder;

class OffreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('offres')->insert([
      'titre'=> 'dev ops',
      'description'=> 'looking for a dev',
      'pdf'=> 'tatatatatata',
      'contrainte'=> '18h',
      'type_offre'=>'projet',
      'entreprise_id'=>'1',
      'date_inline'=>'2020-07-15 17:06:25'
    ]);
    DB::table('offres')->insert([
    'titre'=> 'dev full stack laravel',
    'description'=> 'looking for a dev dsqdsqdsqdsqdsqsdqsdq',
    'pdf'=> 'tatatatatadsqsdqsdqta',
    'contrainte'=> '18h',
    'type_offre'=>'projet',
    'entreprise_id'=>'1',
    'date_inline'=>'2020-07-15 17:06:25'
  ]);
    }
}
