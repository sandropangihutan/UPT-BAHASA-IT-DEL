<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            [
                'username' => 'admin',
                'name' => 'Administrator',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password'),
                'role_id' => 1,
                'status' => 'approved',

            ],
            [
                'username' => 'yosafattambun',
                'name' => 'Yosafat Tambun',
                'email' => 'yosafathtambun@gmail.com',
                'password' => Hash::make('yosafattambun'),
                'role_id' => 2,
                'status' => 'approved',

            ],
            [
                'username' => 'julianti117',
                'name' => 'Julianti Sitorus',
                'email' => 'juliantisitorus071@gmail.com',
                'password' => Hash::make('julianti117'),
                'role_id' => 2,
                'status' => 'approved',
            ],
            [
                'username' => 'pandiganteng',
                'name' => 'Krisna Saragih',
                'email' => 'gantengbanget123@gmail.com',
                'password' => Hash::make('pandiganteng'),
                'role_id' => 2,
                'status' => 'approved',

            ],
            [
                'username' => 'sandropangihutan',
                'name' => 'Sandro Panjaitan',
                'email' => 'sandro123@gmail.com',
                'password' => Hash::make('sandropangihutan'),
                'role_id' => 2,
                'status' => 'approved',

            ],
        );
        foreach($data AS $d){
            User::create([
                'username' => $d['username'],
                'name' => $d['name'],
                'email' => $d['email'],
                'password' => $d['password'],
                'role_id' => $d['role_id'],
                'status' => $d['status'],
            ]);
        }
    }
}