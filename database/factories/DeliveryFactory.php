<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arrayValues = ['delivered','on way','canceled'];

        return [
            'delivery_man_name' => fake()->name(),
            'order_id' => fake()->numberBetween(1,10),
            'status' => $arrayValues[rand(0,2)]
        ];
    }
}
