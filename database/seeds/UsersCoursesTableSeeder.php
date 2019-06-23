<?php

use Illuminate\Database\Seeder;

class UsersCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users__courses')->truncate();
        
        $courseNames = ['Math','Biology','English','Latvian'];

        for($i = 1 ; $i<=\App\User::count() ; $i++){
            \DB::table('users__courses')->insert([
                'user_id' => $i,
                'course_id' => rand(1,\App\Course::count()/2)
            ]);
            \DB::table('users__courses')->insert([
                'user_id' => $i,
                'course_id' => rand((\App\Course::count()/2) +1, \App\Course::count())
            ]);
        }
    }
}
