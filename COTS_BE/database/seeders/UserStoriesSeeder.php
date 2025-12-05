<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserStoriesSeeder extends Seeder
{
    public function run(): void
    {
        $projectIds = DB::table('projects')->pluck('id')->toArray();
        $userIds = DB::table('users_scrum')->pluck('id')->toArray();

        // Nếu có bảng story_statuses
        $statusIds = DB::table('story_statuses')->pluck('id')->toArray();

        if (empty($projectIds) || empty($userIds) || empty($statusIds)) {
            echo "Vui lòng seed projects, users_scrum và story_statuses trước!\n";
            return;
        }

        DB::table('user_stories')->insert([
            [
                'project_id' => $projectIds[0],
                'title' => 'Là người dùng, tôi muốn đăng ký tài khoản',
                'description' => 'Người dùng có thể tạo tài khoản mới để sử dụng ứng dụng',
                'story_point' => 3,
                'status_id' => $statusIds[0],
                'created_by' => $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => $projectIds[0],
                'title' => 'Là người dùng, tôi muốn đăng nhập bằng Google',
                'description' => 'Người dùng có thể đăng nhập nhanh thông qua Google OAuth',
                'story_point' => 5,
                'status_id' => $statusIds[1] ?? $statusIds[0],
                'created_by' => $userIds[1] ?? $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => $projectIds[1] ?? $projectIds[0],
                'title' => 'Là người quản lý, tôi muốn xem báo cáo tiến độ Sprint',
                'description' => 'Cho phép PM xem tiến độ công việc của từng sprint',
                'story_point' => 8,
                'status_id' => $statusIds[0],
                'created_by' => $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
