<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    /**
     * Chạy seeder.
     */
    public function run(): void
    {
        $workspaceIds = DB::table('workspaces')->pluck('id')->toArray();
        $userIds = DB::table('users_scrum')->pluck('id')->toArray();

        if(empty($workspaceIds) || empty($userIds)) {
            echo "Vui lòng seed trước bảng workspaces và users\n";
            return;
        }

        DB::table('projects')->insert([
            [
                'workspace_id' => $workspaceIds[0],
                'name' => 'Dự án Quản lý Scrum',
                'description' => 'Hệ thống quản lý dự án theo phương pháp Scrum',
                'created_by' => $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'workspace_id' => $workspaceIds[0],
                'name' => 'Dự án Website Thương mại điện tử',
                'description' => 'Xây dựng website bán hàng trực tuyến',
                'created_by' => $userIds[1] ?? $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'workspace_id' => $workspaceIds[1] ?? $workspaceIds[0],
                'name' => 'Dự án Mobile App',
                'description' => 'Phát triển ứng dụng di động cho khách hàng',
                'created_by' => $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
