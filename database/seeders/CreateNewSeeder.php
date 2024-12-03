<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class CreateNewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::firstOrCreate([
            "title" => "title",
            "slug" => "title",
            "content" => "<h1>title</h1>",
            "category_id" => 1,
        ]);
    }
}
