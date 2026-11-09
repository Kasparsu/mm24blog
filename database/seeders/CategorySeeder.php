<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory(4)->create();
        foreach($categories as $category) {
            $children = Category::factory(4)->make();
            foreach($children as $child) {
                $child->parent()->associate($category);
                $child->save();
            }
        }
    }
}
