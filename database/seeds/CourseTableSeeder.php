<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \db::table('courses')->truncate();
        
        $courseNames = ['Math','Biology','English','Latvian'];

        for($i = 0 ; $i< 4; $i++){
            \DB::table('courses')->insert([
                'Name' => $courseNames[$i],
                'Duration' => rand(4,8).' months',
                'Cost' => rand(1000,5000),
                'Location' => 'Latvia, Riga'
            ]);
        }
    }
}
