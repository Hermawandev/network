<?php

namespace Database\Factories;

use App\Models\status;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = status::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'body' => $this->faker->sentence(),
           'identifier' => strtolower(Str::random(32)),
           'user_id'=> User::factory()
        ];
    }
}
