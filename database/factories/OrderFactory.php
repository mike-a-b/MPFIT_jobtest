<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fio' => $this->faker->name(),
            'product_id' =>$this->faker->numberBetween(1, 10),
            'comment' => $this->faker->text(),
            'quantity' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
