<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Fire Safety', 'description' => 'Comprehensive fire safety training and prevention techniques', 'icon' => 'fire'],
            ['name' => 'Industrial Safety', 'description' => 'Industrial workplace safety standards and practices', 'icon' => 'industry'],
            ['name' => 'Electrical Safety', 'description' => 'Electrical hazard awareness and prevention', 'icon' => 'bolt'],
            ['name' => 'Emergency Response', 'description' => 'Emergency response procedures and first aid training', 'icon' => 'ambulance'],
            ['name' => 'Fire Officer Training', 'description' => 'Professional fire officer certification programs', 'icon' => 'shield'],
            ['name' => 'Workplace Safety', 'description' => 'General workplace safety and compliance training', 'icon' => 'building'],
        ];

        foreach ($categories as $i => $category) {
            Category::firstOrCreate(
                ['slug' => Str::slug($category['name'])],
                array_merge($category, ['slug' => Str::slug($category['name']), 'sort_order' => $i])
            );
        }
    }
}
