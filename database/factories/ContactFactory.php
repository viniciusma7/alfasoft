<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'number' => $this->faker->unique()->numerify('#########'),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
