<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkspaceRolesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('workspace_roles')->insert([
            [
                'name' => 'Owner',
                'description' => 'Người tạo và quản lý workspace, có quyền cao nhất',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin',
                'description' => 'Quản trị viên workspace, có thể quản lý thành viên và dự án',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Member',
                'description' => 'Thành viên tham gia workspace với quyền hạn hạn chế',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
