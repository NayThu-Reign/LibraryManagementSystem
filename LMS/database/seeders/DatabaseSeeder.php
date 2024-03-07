<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Admin;
use App\Models\Librarian;
use App\Models\Student;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       Book::factory()->count(60)->create();
       Author::factory()->count(5)->create();

       $list = ['News', 'Fiction', 'Science', 'Biography'];
       foreach($list as $name) {
        Category::create(["name" => $name]);
       }

       User::create([
        'name' => 'Admin',
        'email' => 'admin@admin.gmail.com',
        'email_verified_at' => now(),
        'password' => 'password',
        'roles_id' => 1,
        'approve' => 1,
       ]);

       User::create([
        'name' => 'James',
        'email' => 'student@gmail.com',
        'email_verified_at' => now(),
        'password' => 'password',
        'roles_id' => 2,
        'approve' => 1,
       ]);

       Role::create([
        'name' => 'Librarian',
       ]);
       Role::create([
        'name' => 'Student',
       ]);
    }
}
