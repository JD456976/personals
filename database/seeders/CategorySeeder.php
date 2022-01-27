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
                'title' => 'Casual Encounters'
            ],
            [
                'title' => 'Women Seeking Men'
            ],
            [
                'title' => 'Men Seeking Women'
            ],
            [
                'title' => 'Men Seeking Men'
            ],
            [
                'title' => 'Women Seeking Women'
            ],
            [
                'title' => 'Strictly Platonic'
            ],
            [
                'title' => 'Missed Connections'
            ],
            [
                'title' => 'Couples Seeking Men'
            ],
            [
                'title' => 'Couples Seeking Women'
            ]
        ];

        Category::insert($data);
    }
}
