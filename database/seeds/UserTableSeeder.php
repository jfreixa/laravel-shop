<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Sergi',
                'last_name' => 'Moreno',
                'email' => 'sergi@shop.app',
                'password' => \Hash::make('12345'),
                'type' => 'user',
                'active' => 1,
                'address' => 'Plaça Joanot Martorell, 20, Torelló, Barcelona',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Jordi',
                'last_name' => 'Freixa',
                'email' => 'jordi@shop.app',
                'password' => \Hash::make('12345'),
                'type' => 'user',
                'active' => 1,
                'address' => 'Horta del rossell, Gurb, Barcelona',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]
        ];
        DB::table('users')->insert($data);
    }
}
