<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkspacesSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = DB::table('users_scrum')->pluck('id')->toArray();

        if (empty($userIds)) {
            echo "Vui lòng seed bảng users_scrum trước!\n";
            return;
        }

        DB::table('workspaces')->insert([
            [
                'name' => 'Workspace Chính',
                'description' => 'Workspace dành cho toàn công ty',
                'created_by' => $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Team Dự Án A',
                'description' => 'Không gian làm việc dự án A',
                'created_by' => $userIds[1] ?? $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
