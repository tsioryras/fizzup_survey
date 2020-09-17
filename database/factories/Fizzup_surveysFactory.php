<?php

namespace Database\Factories;

use App\Models\Fizzup_surveys;
use Illuminate\Database\Eloquent\Factories\Factory;

class Fizzup_surveysFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fizzup_surveys::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $note = $this->faker->randomElement([0, 1, 2, 3, 4, 5]);
        $date = rand(1429270774, 1600342774);
        $comment = [
            ['Mauvais produit', 'A éviter absolument', 'Impossible à utiliser'],
            ['Trop de bugs ', 'Programmes non adaptés aux débutants', 'Coachs incompétents'],
            ['Pas comme sur la photo', 'Heureusement que c\'est pas cher', 'Du temps et de l\'argent perdus'],
            ['Assez bon produit', 'Pas top mais ça va', 'Rien de nouveau en soi'],
            ['Très satisfait', ' je recommande'],
            ['Excellent produit et mon fils en est très content', ' Exactement ce dont j\'avais besoin.', 'Le sport n\'a jamais autant été aussi plaisant']
        ];
        return [
            'product_reference' => strtoupper($this->faker->randomElement(['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'])) . $this->faker->randomNumber(5),
            'comment' => $this->faker->randomElement($comment[$note]),
            'note' => $note,
            'created_at' => $date
        ];
    }
}
