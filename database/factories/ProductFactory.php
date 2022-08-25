<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->text(25);
        $slug = Str::slug($name);
        $desc = $this->faker->text(100);
        $image_name = $this->faker->imageUrl($width = 140,$height = 300);
        $price = $this->faker->numberBetween($min = 100, $max = 1000);
        return [
            'name' => $name,
            'slug' => $slug,
            'description' => $desc,
            'image_name' => $image_name,
            'price' => $price,
            'sale_price' => $price - 100,
        ];
    }
}
