<?php

namespace Database\Factories;

use App\Models\Inventory;
use Database\Factories\Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    /** @var \Illuminate\Database\Eloquent\Factory $factory */

    protected $model = \App\Models\Inventory::class;

    public function definition() {
        return [
            'category_id'       => $this->faker->numberBetween(1,6),
            'brand'             => $this->faker->name,
            'description'       => $this->faker->text(50),
            'image'             => 'no-image.png',
            'public_price'      => $this->faker->randomDigit(3),
            'dealer_price'      => $this->faker->randomDigit(2),
            'stock_matriz'      => $this->faker->randomDigit(2),
            'stock_virrey'      => $this->faker->randomDigit(2),
            'stock_total'       => $this->faker->randomDigit(2),
            'investment'        => $this->faker->randomDigit(3),
            'gain_public'       => $this->faker->randomDigit(3),
            'dealer_profit'     => $this->faker->randomDigit(2),
            'key_sat'           => $this->faker->text(10),
            'description_sat'   => $this->faker->text(20),
        ];
    }

}
