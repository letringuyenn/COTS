<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkspaceRolesSeeder extends Seeder
{
    public function run(): void
    {
        $workspaceRoles = [
            [
                'name' => 'owner',
                'description' => 'Chủ workspace',
            ],
            [
                'name' => 'scrum_master',
                'description' => 'Scrum Master trong workspace',
            ],
            [
                'name' => 'member',
                'description' => 'Thành viên workspace',
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('workspace_roles')->delete();

        // Thêm dữ liệu mới
        DB::table('workspace_roles')->insert($workspaceRoles);
    }
}
