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
      'entreprise_id'=>'1'
    ]);
    }
}
