<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
      'name'=> 'admin',
      'email'=> 'admin@gmail.com',
      'password'=> bcrypt('admin'),
      'statut'=> 'admin',
      'administrateur_id' => '1',
    ]);
      DB::table('users')->insert([
      'name'=> 'entreprise',
      'email'=> 'entreprise@gmail.com',
      'password'=> bcrypt('entreprise'),
      'image_profil'=> 'seed/images/lacoste.png',
      'statut'=> 'entreprise',
      'entreprise_id' => '1',
    ]);
      DB::table('users')->insert([
      'name'=> 'dev',
      'email'=> 'dev@gmail.com',
      'password'=> bcrypt('dev'),
      'image_profil'=> 'seed/images/developpeur.png',
      'statut'=> 'dev',
      'developpeur_id' => '1'
    ]);
    }
}
