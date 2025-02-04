<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;


class SchoolFactory extends Factory
{
    protected $model = School::class;

    public function definition(): array
    {
        return [
            'school_id' => $this->faker->unique()->regexify('S[0-9]{4}'),
            'name' => $this->faker->company, 
        ];
    }
}
