<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;
    public function definition(): array
    {
        $name = implode(' ', array_slice(explode(' ', $this->faker->sentence), 0, 2));
        $name = substr($name, 0, 15);
        return [
            'name' => $name,
            'hexcolor' => $this->faker->hexcolor(),
            'textcolor' => '#FFFFFF',
        ];
    }
}
