<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemRolesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('system_roles')->insert([
            [
                'name' => 'Admin',
                'description' => 'Quản trị hệ thống, có tất cả quyền hạn',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Scrum Master',
                'description' => 'Hướng dẫn và hỗ trợ nhóm phát triển theo Scrum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Developer',
                'description' => 'Thực hiện các task và user story',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Product Owner',
                'description' => 'Quản lý backlog và xác định yêu cầu sản phẩm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
