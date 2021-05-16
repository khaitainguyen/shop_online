<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => 1,
            'category_parent_id' => 2,
            'brand_id' => 3,
            'name' => $this->faker->name(),
            'description' => $this->faker->name(),
            'orginal_price' => 100,
            'sell_price' => 200,
            'image' => "image",
            'quantity' => 100,
            'quantity_sold' => 50,
            'status' => 1,
            'expired_date' => now(),
            'is_hot' => 1,
        ];
    }
}
