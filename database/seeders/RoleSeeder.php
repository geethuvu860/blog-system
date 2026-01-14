<?php

namespace Database\Seeders;

use App\Models\User_role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User_role::create([
           'role_name' => 'Admin',
            'role_name' => 'User'
        ]);
    }
}
