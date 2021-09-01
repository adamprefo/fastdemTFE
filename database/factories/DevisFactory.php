<?php

namespace Database\Factories;

use App\Models\Devis;
use Illuminate\Database\Eloquent\Factories\Factory;

class DevisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Devis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        
            'start_address' => $this->faker->streetAddress(),
            'finish_address' => $this->faker->streetAddress(),
            'price' => $this->faker->numberBetween($min = 110, $max = 2000)
        ];
    }
}
