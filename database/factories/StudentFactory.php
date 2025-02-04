<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;


class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition():array
    {
        $school = School::inRandomOrder()->first();

        return [
            'student_id' => $this->faker->unique()->regexify('STD[0-9]{4}'),
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'dob' => $this->faker->date('Y-m-d', '2005-01-01'),
            'gpa' => $this->faker->randomFloat(2, 0, 4), 
            'school_id' =>$school->school_id,
             
        
        ];
    }
}
