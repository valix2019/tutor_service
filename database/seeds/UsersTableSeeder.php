<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // delete all existing data
        \DB::table('users')->truncate();
        // manual insert 
        \DB::table('users')->insert([
            'name' => 'aaaaaa',
            'email'=> 'aa@gmail.com',
            'password'=> bcrypt('aaa123'),
            'role'=>'admin'
        ]);
        \DB::table('users')->insert([
            'name' => 'teacher',
            'email'=> 'tt@gmail.com',
            'password'=> bcrypt('ttt123'),
            'role'=>'teacher'
        ]);
        \DB::table('users')->insert([
            'name' => 'student',
            'email'=> 'ss@gmail.com',
            'password'=>bcrypt('sss123')
        ]);
        factory(App\User::class, 15)->create();
    }
}
