<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Items>
 */
class ItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $factory->define(app\Items::class, function (Faker\Generator $faker) {
        return [
            //
            'item_code' => fake()->randomElement(['SB', 'SK', 'SO']) . fake()->unique()->randomNumber(3, false),
            'item_name' => fake()->words(2, true),
            'item_unit' => fake()->randomElement(['Ktk', 'Pcs', 'Duz', 'Rim']),
            'item_stock' => fake()->randomDigit(1),
            'item_stock_reminder' => fake()->randomDigit(1),
            'price' => fake()->randomNumber(5, true),
            'vendor' => fake()->company(1)
        ];
    }
}
