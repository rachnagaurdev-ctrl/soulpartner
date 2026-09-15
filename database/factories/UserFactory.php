<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_admin' => false,
            'phone' => fake()->numerify('##########'),
            'dob' => fake()->dateTimeBetween('-40 years', '-18 years')->format('Y-m-d'),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'city' => fake()->randomElement(['Delhi', 'Mumbai', 'Bangalore', 'Pune', 'Gurgaon', 'Jaipur', 'Chandigarh']),
            'pincode' => fake()->numerify('######'),
            'country' => 'India',
            'iwantto' => fake()->randomElement(['become', 'both']),
            'category' => implode(',', fake()->randomElements(["cafe-food-partner","city-tour-partner","clubbing","coffee-partner","concert-partner","domestic-help","elder-care","event-partner","gaming-partner-physical","hangingout","in-person-meeting","medical-support","movie-partner","professional-networking-partner","shopping-buddy","travel-partner"], fake()->numberBetween(1, 3))),
            'price_per_hour' => fake()->numberBetween(5, 50) * 100, // 500 to 5000 in steps of 100
            'profile_image' => 'https://i.pravatar.cc/300?u=' . fake()->uuid(),
            'bio' => fake()->paragraph(),
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
