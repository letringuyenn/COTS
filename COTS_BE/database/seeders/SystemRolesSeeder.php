<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemRolesSeeder extends Seeder
{
    public function run(): void
    {
        $systemRoles = [
            [
                'name' => 'admin',
                'description' => 'Quản trị hệ thống',
            ],
            [
                'name' => 'member',
                'description' => 'Thành viên',
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('system_roles')->delete();

        // Thêm dữ liệu mới
        DB::table('system_roles')->insert($systemRoles);
    }
}
