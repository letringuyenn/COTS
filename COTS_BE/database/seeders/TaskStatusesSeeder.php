<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskStatusesSeeder extends Seeder
{
    public function run(): void
    {
        $taskStatuses = [
            [
                'name' => 'todo',
                'description' => 'Cần làm',
            ],
            [
                'name' => 'in_progress',
                'description' => 'Đang làm',
            ],
            [
                'name' => 'testing',
                'description' => 'Đang kiểm thử',
            ],
            [
                'name' => 'done',
                'description' => 'Đã hoàn thành',
            ],
            [
                'name' => 'approved',
                'description' => 'Đã duyệt',
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('task_statuses')->delete();

        // Thêm dữ liệu mới
        DB::table('task_statuses')->insert($taskStatuses);
    }
}
