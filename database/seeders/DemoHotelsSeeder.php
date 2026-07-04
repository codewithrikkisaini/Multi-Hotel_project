<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class DemoHotelsSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Roles
        $superAdminRole = Role::firstOrCreate(['name' => 'Merahkie Super Admin'], ['slug' => 'merahkie-super-admin']);
        $hotelAdminRole = Role::firstOrCreate(['name' => 'Hotel Admin'], ['slug' => 'hotel-admin']);
        $frontDeskRole = Role::firstOrCreate(['name' => 'Front Desk'], ['slug' => 'front-desk']);

        // Create Super Admin User
        User::firstOrCreate(
            ['email' => 'superadmin@merahkie.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'role_id' => $superAdminRole->id,
            ]
        );

        $hotelsData = [
            ['name' => 'Buzen Suites', 'rooms' => 45],
            ['name' => 'Country Inn', 'rooms' => 45],
            ['name' => 'Super Comfort Express', 'rooms' => 45],
            ['name' => 'Robinson Inn & Suites', 'rooms' => 75],
            ['name' => 'Merahkie Silk Road Demo Hotel', 'rooms' => 25],
        ];

        foreach ($hotelsData as $index => $data) {
            $hotel = Hotel::firstOrCreate(
                ['email' => 'contact' . $index . '@' . str_replace(' ', '', strtolower($data['name'])) . '.com'],
                [
                    'hotel_name' => $data['name'],
                    'address' => 'Demo Address',
                    'city' => 'Demo City',
                    'country' => 'Demo Country',
                ]
            );

            // Create Hotel Admin
            User::firstOrCreate(
                ['email' => 'admin@' . str_replace(' ', '', strtolower($data['name'])) . '.com'],
                [
                    'name' => $data['name'] . ' Admin',
                    'password' => Hash::make('password'),
                    'role_id' => $hotelAdminRole->id,
                    'hotel_id' => $hotel->id,
                ]
            );

            // Create Front Desk User
            User::firstOrCreate(
                ['email' => 'frontdesk@' . str_replace(' ', '', strtolower($data['name'])) . '.com'],
                [
                    'name' => $data['name'] . ' Front Desk',
                    'password' => Hash::make('password'),
                    'role_id' => $frontDeskRole->id,
                    'hotel_id' => $hotel->id,
                ]
            );

            // Rooms will be seeded later by calling standard seeder modified for hotel_id or handled by application logic
        }
    }
}
