<?php

namespace Database\Factories;

use App\Models\IntroduceDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class IntroduceDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IntroduceDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'introduce_id' => rand(1,10),
            'name' => $this->faker->name(),
            'image' => $this->faker->name(),
            'desciption' => $this->faker->name(),
            'total_view' => 100,
        ];
    }
}
