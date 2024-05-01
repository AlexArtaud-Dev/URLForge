<?php

namespace Database\Factories;

use App\Models\Url;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UrlFactory extends Factory
{
    protected $model = Url::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'originalUrl' => $this->faker->url(),
            'slug' => $this->faker->slug(),
            'title' => $this->faker->word(),
            'click_count' => $this->faker->randomNumber(),
            'max_click' => $this->faker->randomNumber(),
            'password' => $this->faker->password(),
            'expiration_date' => Carbon::now(),
        ];
    }
}
