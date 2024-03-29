<?php

namespace Database\Factories;
use Database\Factories\Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        return [
            'name'      => $name,
            'slug'      => Str::slug($name),
            'rfc'       => $this->faker->text(10),
            'phone'     => $this->faker->randomNumber(9),
            'street'    => $this->faker->streetAddress(),
            'number'    => $this->faker->randomDigit(3),
            'suburb'    => $this->faker->streetAddress(),
            'cp'        => $this->faker->randomNumber(5),
        ];
    }
}
