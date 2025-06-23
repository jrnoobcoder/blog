<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;    
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            'Technology',
            'Health',
            'Lifestyle',
            'Travel',
            'Food',
            'Education',
            'Finance',
            'Entertainment',
            'Sports',
            'Fashion', 

        ]   ;
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }   
        //Category::factory(10)->create();
        //Post::factory(100)->create();
       //User::factory()->count(1)->create();
        User::factory()->create([
            'name' => 'Admin User',
            'username' => 'admin_user',
            'email' => 'jrnoobcoder@gmail.com',
        ] );


    }
}
