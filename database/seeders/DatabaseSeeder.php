<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
            'name' => 'Admin',
            'description' => 'Full access to manage users, content, and settings.',
        ]);

        $moderatorRole = Role::create([
            'name' => 'Moderator/Editor',
            'description' => 'Editing and publishing rights for articles.',
        ]);

        $authorRole = Role::create([
            'name' => 'Author/Publisher',
            'description' => 'Can submit articles, manage their content, and view performance statistics.',
        ]);
    }
}
