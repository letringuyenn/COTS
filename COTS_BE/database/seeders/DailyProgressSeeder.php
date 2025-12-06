<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailyProgressSeeder extends Seeder
{
    public function run(): void
    {
        $dailyProgress = [
            [
                'task_id' => 1,   // Task "Phân tích yêu cầu"
                'user_id' => 1,   // Admin
                'date' => now()->toDateString(),
                'hours_worked' => 4.5,
                'progress_percentage' => 40,
                'notes' => 'Hoàn thành phần phân tích sơ bộ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_id' => 2,   // Task "Thiết kế cơ sở dữ liệu"
                'user_id' => 2,   // Member
                'date' => now()->toDateString(),
                'hours_worked' => 3.0,
                'progress_percentage' => 20,
                'notes' => 'Bắt đầu thiết kế bảng chính',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_id' => 3,   // Task "Viết tài liệu hướng dẫn"
                'user_id' => 2,   // Member
                'date' => now()->toDateString(),
                'hours_worked' => 2.0,
                'progress_percentage' => 10,
                'notes' => 'Soạn thảo phần giới thiệu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('daily_progress')->truncate();
        DB::table('daily_progress')->delete();

        // Thêm dữ liệu mới
        DB::table('daily_progress')->insert($dailyProgress);
    }
}
