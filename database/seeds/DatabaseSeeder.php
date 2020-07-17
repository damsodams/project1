<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        AdministrateurSeeder::class,
        EntrepriseSeeder::class,
        DeveloppeurSeeder::class,
        UserSeeder::class,
        DiplomeSeeder::class,
        PostulerSeeder::class,
        OffreSeeder::class
      ]);
    }
}
