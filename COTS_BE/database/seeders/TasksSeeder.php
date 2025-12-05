<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;

class TasksSeeder extends Seeder
{
    /**
     * Chạy seeder.
     */
    public function run(): void
    {
        // Giả lập ID người dùng và user_story có sẵn
        $userIds = DB::table('users_scrum')->pluck('id')->toArray();
        $userStoryIds = DB::table('user_stories')->pluck('id')->toArray();
        $priorityIds = DB::table('priorities')->pluck('id')->toArray();
        $statusIds = DB::table('task_statuses')->pluck('id')->toArray();

        if(empty($userIds) || empty($userStoryIds)) {
            echo "Vui lòng seed trước users và user_stories\n";
            return;
        }

        DB::table('tasks')->insert([
            [
                'title' => 'Thiết kế giao diện trang chủ',
                'description' => 'Tạo wireframe và mockup cho trang chủ',
                'priority_id' => $priorityIds[1] ?? 2, // mặc định trung bình
                'status_id' => $statusIds[0] ?? 1, // mới tạo
                'estimated_hours' => 8,
                'actual_hours' => null,
                'start_date' => now(),
                'due_date' => now()->addDays(5),
                'completed_at' => null,
                'approved_at' => null,
                'approved_by' => null,
                'user_story_id' => $userStoryIds[0],
                'created_by' => $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Phát triển API đăng nhập',
                'description' => 'Xây dựng API đăng nhập và đăng ký người dùng',
                'priority_id' => $priorityIds[2] ?? 3, // ưu tiên cao
                'status_id' => $statusIds[1] ?? 2, // đang thực hiện
                'estimated_hours' => 12,
                'actual_hours' => 5,
                'start_date' => now()->subDays(2),
                'due_date' => now()->addDays(3),
                'completed_at' => null,
                'approved_at' => null,
                'approved_by' => null,
                'user_story_id' => $userStoryIds[1] ?? $userStoryIds[0],
                'created_by' => $userIds[1] ?? $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Viết unit test cho module thanh toán',
                'description' => 'Tạo các test case cho API thanh toán',
                'priority_id' => $priorityIds[3] ?? 4, // khẩn cấp
                'status_id' => $statusIds[0] ?? 1, // mới tạo
                'estimated_hours' => 6,
                'actual_hours' => null,
                'start_date' => now(),
                'due_date' => now()->addDays(2),
                'completed_at' => null,
                'approved_at' => null,
                'approved_by' => null,
                'user_story_id' => $userStoryIds[2] ?? $userStoryIds[0],
                'created_by' => $userIds[2] ?? $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
