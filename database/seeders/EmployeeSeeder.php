<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::factory(200)->create();
        $employee = new Employee();
        $employee->title = "Dr";
        $employee->first_name = "Kabalan";
        $employee->last_name = "Chaccour";
        $employee->email = "kaba@gmail.com";
        $employee->telephone = "123";
        $employee->address = "beirut";
        $employee->save();
    }
}
