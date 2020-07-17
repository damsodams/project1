<?php

use Illuminate\Database\Seeder;

class DiplomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('diplomes')->insert([
      'intitule'=> 'BTS',
      'date_obtention'=> '2017',
      'mention'=> 'bien',
      'developpeur_id'=> '1'
      ]);
      DB::table('diplomes')->insert([
      'intitule'=> 'Master',
      'date_obtention'=> '2020',
      'mention'=> 'bien',
      'developpeur_id'=> '1'
      ]);
    }
}
