<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
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
        // Ensure roles are created
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Define the password for all users
        $password = Hash::make('password'); // Use a hashed password for security

        // Create users with assigned roles
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'phone' => '1234567890',
                'address' => '123 Admin St',
                'birthday' => '1980-01-01',
                'gender' => 'male',
                'username' => 'adminuser',
                'password' => $password,
                'roles' => [$adminRole->name],
            ],
            [
                'name' => 'Teacher One',
                'email' => 'teacher1@example.com',
                'phone' => '1234567891',
                'address' => '456 Teacher Ave',
                'birthday' => '1985-02-02',
                'gender' => 'female',
                'username' => 'teacherone',
                'password' => $password,
                'roles' => [$teacherRole->name],
            ],
            [
                'name' => 'Teacher Two',
                'email' => 'teacher2@example.com',
                'phone' => '1234567892',
                'address' => '789 Teacher Blvd',
                'birthday' => '1990-03-03',
                'gender' => 'male',
                'username' => 'teachertwo',
                'password' => $password,
                'roles' => [$teacherRole->name],
            ],
            [
                'name' => 'User One',
                'email' => 'user1@example.com',
                'phone' => '1234567893',
                'address' => '321 User St',
                'birthday' => '1995-04-04',
                'gender' => 'female',
                'username' => 'userone',
                'password' => $password,
                'roles' => [$userRole->name],
            ],
            [
                'name' => 'User Two',
                'email' => 'user2@example.com',
                'phone' => '1234567894',
                'address' => '654 User Ave',
                'birthday' => '2000-05-05',
                'gender' => 'male',
                'username' => 'usertwo',
                'password' => $password,
                'roles' => [$userRole->name],
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'phone' => $userData['phone'],
                'address' => $userData['address'],
                'birthday' => $userData['birthday'],
                'gender' => $userData['gender'],
                'username' => $userData['username'],
                'password' => $userData['password'],
            ]);

            $user->assignRole($userData['roles']);
        }
    }
}
