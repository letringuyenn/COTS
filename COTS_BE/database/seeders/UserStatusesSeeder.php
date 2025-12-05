<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserStatusesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user_statuses')->insert([
            ['name' => 'Hoạt động', 'description' => 'Người dùng đang hoạt động', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tạm khóa', 'description' => 'Người dùng bị tạm khóa', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vô hiệu hóa', 'description' => 'Người dùng không còn quyền truy cập', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
