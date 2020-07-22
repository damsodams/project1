<?php

use Illuminate\Database\Seeder;

class DeveloppeurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('developpeurs')->insert([
      'competence'=> 'c ; c++ ; c#',
      'cv'=> 'seed/pdf/cv.pdf',
      'photo'=> 'seed/images/developpeur.png',
      'adresse'=> '1 Place Giovanni da Verrazzano',
      'ville' => 'lyon',
      'code_postal' => '345678',
      'telephone' => '23456789',
      'date_naissance' => '2020-07-15 17:06:25',
    ]);
    }
}
