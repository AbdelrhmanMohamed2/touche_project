<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph(3),
            'image' => 'product.png',
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'quantity' => $this->faker->numberBetween(50,1000),
            'category_id' => $this->faker->numberBetween(1, 5),

        ];
    }
}
