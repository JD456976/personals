<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Casual Encounters',
                'slug' => 'casual-encounters',
            ],
            [
                'title' => 'Women Seeking Men',
                'slug' => 'women-seeking-men'
            ],
            [
                'title' => 'Men Seeking Women',
                'slug' => 'men-seeking-women'
            ],
            [
                'title' => 'Men Seeking Men',
                'slug' => 'men-seeking-men'
            ],
            [
                'title' => 'Women Seeking Women',
                'slug' => 'women-seeking-women'
            ],
            [
                'title' => 'Strictly Platonic',
                'slug' => 'strictly-platonic'
            ],
            [
                'title' => 'Missed Connections',
                'slug' => 'missed-connections'
            ],
            [
                'title' => 'Couples Seeking Men',
                'slug' => 'couples-seeking-men'
            ],
            [
                'title' => 'Couples Seeking Women',
                'slug' => 'couples-seeking-women'
            ]
        ];

        Category::insert($data);
    }
}
