<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staticPage = ['about-us', 'contact', 'homepage'];

        foreach ($staticPage as $page) {

            Page::create([
                'title' => $page,
                'description' => $page,
                'seo_description' => $page,
                'seo_keywords' => $page,
                'status' => 'Active',
            ]);

        }
    }
}
