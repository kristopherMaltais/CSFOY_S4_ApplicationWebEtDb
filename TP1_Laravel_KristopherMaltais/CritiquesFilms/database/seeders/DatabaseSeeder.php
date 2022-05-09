<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([LanguageSeeder::class]);
        $this->call([FilmSeeder::class]);
        $this->call([ActorSeeder::class]);
        $this->call([ActorFilmSeeder::class]);
        $this->call([RoleSeeder::class]);

    }
}
