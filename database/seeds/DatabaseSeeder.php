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
        // fills up database with data
        // takes table seeders as parametres
        $this->call(UsersTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(UsersCoursesTableSeeder::class);
    }
}
