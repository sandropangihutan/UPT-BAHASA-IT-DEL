<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        // $this->call(PermissionsSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(GalleriesSeeder::class);
        // $this->call(ConversationsSeeder::class);
    }
}
