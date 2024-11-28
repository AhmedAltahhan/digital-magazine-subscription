<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserPermission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            UserSeeder::class,
            ArticleSeeder::class,
            CommentSeeder::class,
            MagazineSeeder::class,
            PaymentSeeder::class,
            SubscriptionSeeder::class,
        ]);
    }
}
