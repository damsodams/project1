<?php

use Illuminate\Database\Seeder;

class AdministrateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('administrateurs')->insert([
      'nom'=> 'payet',
      'prenom'=> 'damien',
      ]);
    }
}
