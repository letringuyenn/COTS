<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserStatusesSeeder extends Seeder
{
    public function run(): void
    {
        $userStatuses = [
            [
                'name' => 'active',
                'description' => 'Người dùng đang hoạt động',
            ],
            [
                'name' => 'pending',
                'description' => 'Người dùng đang chờ xác minh',
            ],
            [
                'name' => 'inactive',
                'description' => 'Người dùng ngưng hoạt động',
            ],
            [
                'name' => 'banned',
                'description' => 'Người dùng bị cấm',
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('user_statuses')->delete();

        // Thêm dữ liệu mới
        DB::table('user_statuses')->insert($userStatuses);
    }
}
