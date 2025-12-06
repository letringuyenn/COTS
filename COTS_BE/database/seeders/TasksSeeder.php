<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    public function run(): void
    {
        $tasks = [
            [
                'title' => 'Phân tích yêu cầu',
                'description' => 'Thu thập và phân tích yêu cầu từ khách hàng',
                'priority_id' => 2, // medium
                'status_id' => 1,   // todo
                'estimated_hours' => 10,
                'actual_hours' => null,
                'start_date' => now()->toDateString(),
                'due_date' => now()->addDays(7)->toDateString(),
                'completed_at' => null,
                'approved_at' => null,
                'approved_by' => null,
                'board_id' => 1,    // Giả sử board mặc định có id = 1
                'created_by' => 1,  // Giả sử admin có id = 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Thiết kế cơ sở dữ liệu',
                'description' => 'Xây dựng mô hình dữ liệu cho hệ thống',
                'priority_id' => 3, // high
                'status_id' => 2,   // in_progress
                'estimated_hours' => 15,
                'actual_hours' => 5,
                'start_date' => now()->toDateString(),
                'due_date' => now()->addDays(10)->toDateString(),
                'completed_at' => null,
                'approved_at' => null,
                'approved_by' => null,
                'board_id' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Viết tài liệu hướng dẫn',
                'description' => 'Soạn thảo tài liệu cho người dùng cuối',
                'priority_id' => 1, // low
                'status_id' => 1,   // todo
                'estimated_hours' => 8,
                'actual_hours' => null,
                'start_date' => now()->toDateString(),
                'due_date' => now()->addDays(14)->toDateString(),
                'completed_at' => null,
                'approved_at' => null,
                'approved_by' => null,
                'board_id' => 2,    // Giả sử Sprint 1 có id = 2
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('tasks')->delete();

        // Thêm dữ liệu mới
        DB::table('tasks')->insert($tasks);
    }
}
