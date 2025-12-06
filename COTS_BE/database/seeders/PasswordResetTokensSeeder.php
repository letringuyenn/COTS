<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PasswordResetTokensSeeder extends Seeder
{
    public function run(): void
    {
        $tokens = [
            [
                'email' => 'admin@example.com',
                'token' => Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'member@example.com',
                'token' => Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('password_reset_tokens')->truncate();
        DB::table('password_reset_tokens')->delete();

        // Thêm dữ liệu mới
        DB::table('password_reset_tokens')->insert($tokens);
    }
}
