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
			//
			'product_name' => $this->faker->sentence(3), // product name. text
			'product_desc' => $this->faker->paragraph, //desc of the post. text
			'product_short' => $this->faker->sentence(5), //short desct for product. text
			'tags' => $this->faker->word, //product tags single word, string
		];
	}
}
