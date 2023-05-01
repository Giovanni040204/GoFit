<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>'Admin',
                'email'=>'admin',
                'role'=>'admin',
                'password'=>bcrypt('admin')
            ],
            [
                'name'=>'Manager Operasional',
                'email'=>'MO2023',
                'role'=>'manager',
                'password'=>bcrypt('2023MO')
            ],
            [
                'name'=>'Kasir',
                'email'=>'KASIR2023',
                'role'=>'kasir',
                'password'=>bcrypt('2023KASIR')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
