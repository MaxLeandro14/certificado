<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Empresa;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Admin',
            'email'=>'admin@mail.com',
            'password'=> bcrypt('123456'),
            'empresa' => 'MASTER01'
        ]);
        User::create([
            'name'=> 'Admin2',
            'email'=>'admin2@mail.com',
            'password'=> bcrypt('123456'),
            'empresa' => '1'
        ]);
        Empresa::create([
            'name'=> 'MASTER01',
            'ativo'=>1,
            'cnpj'=> '123456'
        ]);
    }
}
