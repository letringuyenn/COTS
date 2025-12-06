<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkspaceMembersSeeder extends Seeder
{
    public function run(): void
    {
        $workspaceMembers = [
            [
                'workspace_id' => 1, // Giả sử workspace mặc định có id = 1
                'user_id' => 1,      // Giả sử admin có id = 1
                'role_id' => 1,      // owner
                'joined_at' => now(),
            ],
            [
                'workspace_id' => 1,
                'user_id' => 2,      // Giả sử member có id = 2
                'role_id' => 3,      // member
                'joined_at' => now(),
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('workspace_members')->truncate();
        DB::table('workspace_members')->delete();

        // Thêm dữ liệu mới
        DB::table('workspace_members')->insert($workspaceMembers);
    }
}
