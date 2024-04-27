<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;
use App\Models\Item;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = Category::pluck('id')->toArray();
        return [
            'category_id' => $this->faker->randomElement($categories),
            'title' => $this->faker->company,
            'description' => $this->faker->realText(rand(20,200)),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
        ];
    }
}
