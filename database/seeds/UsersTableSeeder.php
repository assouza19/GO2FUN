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
        \DB::table('users')->insert([
            [
                'name' => 'Felipe',
                'email' => 'felipe@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
                'remember_token' => str_random(10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],

            [
                'name' => 'Aline',
                'email' => 'aline@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'ad',
                'remember_token' => str_random(10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],

            [
                'name' => 'Jhon',
                'email' => 'jhon@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'user',
                'remember_token' => str_random(10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]

        ]);
    }
}
