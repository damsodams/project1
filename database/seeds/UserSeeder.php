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
      'statut'=> 'entreprise',
      'entreprise_id' => '1',
    ]);
      DB::table('users')->insert([
      'name'=> 'dev',
      'email'=> 'dev@gmail.com',
      'password'=> bcrypt('dev'),
      'statut'=> 'dev',
      'developpeur_id' => '1' 
    ]);
    }
}
