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
        $truck = ;
       return[

            'devis_id' => rand(1,6),
       'truck_id  ' => rand(1,3),                   
       'start_time' => $this->faker->time($format = 'H:i:s', $max = '18:00:00'),
       'finish_time' => $this->faker->time($format = 'H:i:s', $max = '18:00:00'),
       'startDate' => $this->faker->dateTimeBetween('+0 days', '+1 years'),
       'packs_id '=>rand(1,3)


     

       ];
    }
}
