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
        return[
             'user_id' => rand(1,6),
        'startAddress' => $this->faker->streetAddress(),                   
        'finishAddress' => $this->faker->streetAddress(), 
        'startDate' => $this->faker->dateTimeBetween('+0 days', '+1 years'),
        'starTime' => $this->faker->time($format = 'H:i:s', $max = '18:00:00'),
        'price'=>'455,00',
        'status'=>'attente',
        'price'=>'455,00',
        'packs_id'=>'1' 


      

        ];
        
    }
}
