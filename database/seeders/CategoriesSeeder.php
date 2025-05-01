<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "name" => "Developer"
            ],
            [
                "name" => "Designer"
            ],
            [
                "name" => "Manager"
            ],
            [
                "name" => "Marketer"
            ],
            [
                "name" => "Writer"
            ],
        ];
        
        Category::insert($categories);
    }
}
