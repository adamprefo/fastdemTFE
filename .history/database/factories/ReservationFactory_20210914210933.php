<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return[

            'devis_id ' => rand(1,6),
       'truck_id ' => rand(1,3),                   
       'finishAddress' => $this->faker->streetAddress(), 
       'startDate' => $this->faker->dateTimeBetween('+0 days', '+1 years'),
       'starTime' => $this->faker->time($format = 'H:i:s', $max = '18:00:00'),
       'price'=> rand(210,600),
       'status'=>'attente',
       'packs_id'=>rand(1,3)


     

       ];
    }
}
