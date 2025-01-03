<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName,
            'email' => fake()->unique()->safeEmail,
            'phone' => fake()->e164PhoneNumber,
            'country' => 'US',
            'profile_picture' => null, // Handle image upload accordingly
            'gender' => fake()->randomElement(['MAN', 'WOMAN']), // Adjust as needed
            'birthday' => fake()->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'),
            'email_verified_at' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
