<?php

namespace Database\Factories;

use App\Models\Fizzup_customers;
use Illuminate\Database\Eloquent\Factories\Factory;

class Fizzup_customersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fizzup_customers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pseudo' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
