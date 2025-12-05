<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskAssigneesSeeder extends Seeder
{
    public function run(): void
    {
        $taskAssignees = [
            [
                'task_id' => 1,   // Giả sử task "Phân tích yêu cầu" có id = 1
                'user_id' => 1,   // Admin (id = 1)
                'assigned_at' => now(),
                'assigned_by' => 1, // Admin tự gán
            ],
            [
                'task_id' => 2,   // Giả sử task "Thiết kế cơ sở dữ liệu" có id = 2
                'user_id' => 2,   // Member (id = 2)
                'assigned_at' => now(),
                'assigned_by' => 1, // Admin gán cho member
            ],
            [
                'task_id' => 3,   // Giả sử task "Viết tài liệu hướng dẫn" có id = 3
                'user_id' => 2,   // Member (id = 2)
                'assigned_at' => now(),
                'assigned_by' => 1,
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('task_assignees')->truncate();
        DB::table('task_assignees')->delete();

        // Thêm dữ liệu mới
        DB::table('task_assignees')->insert($taskAssignees);
    }
}
