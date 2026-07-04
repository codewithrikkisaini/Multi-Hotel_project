<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'Admin'], ['slug' => 'admin']);
        Role::firstOrCreate(['name' => 'Receptionist'], ['slug' => 'receptionist']);
    }
}
