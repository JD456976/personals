<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Page;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3,true),
            'slug' => $this->faker->slug,
            'content' => $this->faker->paragraphs(3, true),
            'is_active' => $this->faker->boolean,
            'main_menu' => $this->faker->boolean,
            'footer_menu' => $this->faker->boolean,
        ];
    }
}
