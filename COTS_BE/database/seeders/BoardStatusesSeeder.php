<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardStatusesSeeder extends Seeder
{
    public function run(): void
    {
        $boardStatuses = [
            [
                'name' => 'planning',
                'description' => 'Đang lên kế hoạch',
            ],
            [
                'name' => 'active',
                'description' => 'Đang hoạt động',
            ],
            [
                'name' => 'completed',
                'description' => 'Đã hoàn thành',
            ],
            [
                'name' => 'cancelled',
                'description' => 'Đã hủy',
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('board_statuses')->delete();

        // Thêm dữ liệu mới
        DB::table('board_statuses')->insert($boardStatuses);
    }
}
