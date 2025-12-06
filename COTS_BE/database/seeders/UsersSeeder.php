<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Administrator',
                'email' => 'admin@example.com',
                // store hashed password
                'password' => Hash::make('123456'),
                'system_role_id' => 1, // admin
                'status_id' => 1, // active
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Member User',
                'email' => 'member@example.com',
                'password' => Hash::make('123456'),
                'system_role_id' => 2, // member
                'status_id' => 2, // pending
                'email_verified_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('users')->delete();

        // Thêm dữ liệu mới
        DB::table('users')->insert($users);
    }
}
