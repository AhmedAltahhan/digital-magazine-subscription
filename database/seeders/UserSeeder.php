<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manager = User::factory()->create([
            'name' => 'Admin',
            'email' => 'manager@gmail.com',
            'type' => 'manager',
            'password' => bcrypt('password')
        ]);
        $data = [
            ['permission_id' => 1],
            ['permission_id' => 2],
            ['permission_id' => 3],
        ];
        $manager->permissions()->attach($data);
        // User::factory()->count(10)->create();
    }
}
