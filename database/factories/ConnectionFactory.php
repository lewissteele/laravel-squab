<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Connection>
 */
class ConnectionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'host' => fake()->domainName(),
            'password' => fake()->password(),
            'username' => fake()->userName(),
        ];
    }
}
