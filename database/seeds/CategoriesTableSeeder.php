<?php

use Illuminate\Database\Seeder;
use App\CategoryPost;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = "Framework Laravel";
        CategoryPost::create([
            'name' => $title,
            'slug' => str_slug($title)
        ]);

        $title = "Framework Vue Js";
        CategoryPost::create([
            'name' => $title,
            'slug' => str_slug($title)
        ]);
    }
}
