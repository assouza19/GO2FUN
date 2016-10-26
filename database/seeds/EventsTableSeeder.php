<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('events')->insert([
            [
                'user_id' => 1,
                'categories' => 'Pizza, Restaurante, Chinês, Teste',
                'name' => 'Evento teste',
                'status' => 'open',
                'value' => 5000,
                'cep'   => 8925460,
                'init_at' => date('Y-m-d H:i:s'),
                'end_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => 1,
                'categories' => 'Pizza, Chinês, Teste',
                'name' => 'Evento teste 2',
                'status' => 'open',
                'value' => 5000,
                'cep'   => 8925460,
                'init_at' => date('Y-m-d H:i:s'),
                'end_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user_id' => 1,
                'categories' => 'Restaurante, Chinês, Teste',
                'name' => 'Evento teste 3',
                'status' => 'open',
                'value' => 5000,
                'cep'   => 8925460,
                'init_at' => date('Y-m-d H:i:s'),
                'end_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
