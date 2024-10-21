<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'name' => 'Administrator'
            ],
            [
                'name' => 'Mahasiswa'
            ],
            [
                'name' => 'Dosen/Staff'
            ],
            [
                'name' => 'Masyarakat'
            ],
        );

        foreach($data AS $d){
            Role::create([
                'name' => $d['name']
            ]);
        }
    }
}
