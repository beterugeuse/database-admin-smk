<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    // Password yang akan digunakan oleh semua user dummy
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->name(), // Membuat nama acak
            'email' => fake()->unique()->safeEmail(), // Membuat email unik
            'password' => static::$password ??= Hash::make('password'), // Password default: 'password'
        ];
    }
}
