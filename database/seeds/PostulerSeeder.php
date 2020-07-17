<?php

use Illuminate\Database\Seeder;

class PostulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('postuler__offres')->insert([
      'offre_id'=> '1',
      'developpeur_id'=> '1',
      'type_contrat' => '1'
    ]);
    }
}
