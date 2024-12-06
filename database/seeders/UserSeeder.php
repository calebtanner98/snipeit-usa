<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Ensure there are companies and departments to associate with the user
        if (! Company::count()) {
            $this->call(CompanySeeder::class);
        }
        $companyIds = Company::all()->pluck('id');

        if (! Department::count()) {
            $this->call(DepartmentSeeder::class);
        }
        $departmentIds = Department::all()->pluck('id');

        // Create a user with your own information
        User::create([
            'name' => 'Caleb Tanner',          // Replace with your name
            'email' => 'calebtanner2014@yahoo.com', // Replace with your email
            'password' => Hash::make('Calebt2024!!'), // Replace with your password
            'company_id' => null,
            'department_id' => null,
        ]);
    }
}

