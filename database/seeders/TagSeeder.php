<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Php', 'Laravel', 'Backend development', 'frontend development'];

        foreach ($categories as $category) {
            Tag::create([
                'name' => $category
            ]);
        }
    }
}