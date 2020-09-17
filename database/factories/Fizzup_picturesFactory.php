<?php

namespace Database\Factories;

use App\Models\Fizzup_pictures;
use Illuminate\Database\Eloquent\Factories\Factory;

class Fizzup_picturesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fizzup_pictures::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'link' => $this->faker->imageUrl()
        ];
    }
}
