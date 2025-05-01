<?php

namespace Database\Seeders;

use App\Models\Hobby;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HobbiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hobbies = [
            [
                "name" => "Programming"
            ],
            [
                "name" => "Reading"
            ],
            [
                "name" => "Photography"
            ],
            [
                "name" => "Games"
            ]
        ];
        
        Hobby::insert($hobbies);
    }
}
