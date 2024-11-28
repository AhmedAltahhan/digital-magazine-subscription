<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            ['title' => 'user.curd'],
            ['title' => 'subscription.curd'],
            ['title' => 'magazine.curd'],
            ['title' => 'magazine.create'],
            ['title' => 'article.create'],
            ['title' => 'comment.create'],
            ['title' => 'subscription.create'],
            ['title' => 'article.index'],
        ]);
    }
}
