<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Employee::class;
    public function definition(): array
    {
        return [
            'title'=>$this->faker->title(),
            'email' => $this->faker->safeEmail(),
            'telephone' => $this->faker->phoneNumber(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'address' => $this->faker->address(),
        ];
    }
}
