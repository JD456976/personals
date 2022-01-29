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
                'icon' => '&#128101;'
            ],
            [
                'title' => 'Women Seeking Men',
                'slug' => 'women-seeking-men',
                'icon' => '&#128105;&#8205;&#10084;&#65039;&#8205;&#128104;'
            ],
            [
                'title' => 'Men Seeking Women',
                'slug' => 'men-seeking-women',
                'icon' => '&#128105;&#8205;&#10084;&#65039;&#8205;&#128104;'
            ],
            [
                'title' => 'Men Seeking Men',
                'slug' => 'men-seeking-men',
                'icon' => '&#128104;&#8205;&#10084;&#65039;&#8205;&#128104;'
            ],
            [
                'title' => 'Women Seeking Women',
                'slug' => 'women-seeking-women',
                'icon' => '&#128105;&#8205;&#10084;&#65039;&#8205;&#128105;'
            ],
            [
                'title' => 'Strictly Platonic',
                'slug' => 'strictly-platonic',
                'icon' => '&#128588;'
            ],
            [
                'title' => 'Missed Connections',
                'slug' => 'missed-connections',
                'icon' => '&#9997;&#65039;'
            ],
            [
                'title' => 'Couples Seeking Men',
                'slug' => 'couples-seeking-men',
                'icon' => '&#129730;'
            ],
            [
                'title' => 'Couples Seeking Women',
                'slug' => 'couples-seeking-women',
                'icon' => '&#129730;'
            ]
        ];

        Category::insert($data);
    }
}
