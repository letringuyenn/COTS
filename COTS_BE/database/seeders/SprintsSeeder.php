<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SprintsSeeder extends Seeder
{
    /**
     * Chạy seeder.
     */
    public function run(): void
    {
        $projectIds = DB::table('projects')->pluck('id')->toArray();
        $userIds = DB::table('users_scrum')->pluck('id')->toArray();

        $statusIds = [1,2,3]; // 1-Mới, 2-Đang chạy, 3-Hoàn thành

        if(empty($projectIds) || empty($userIds)) {
            echo "Vui lòng seed trước bảng projects và users\n";
            return;
        }

        DB::table('sprints')->insert([
            [
                'project_id' => $projectIds[0],
                'name' => 'Sprint 1',
                'start_date' => now(),
                'end_date' => now()->addDays(14),
                'status_id' => $statusIds[0],
                'created_by' => $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => $projectIds[0],
                'name' => 'Sprint 2',
                'start_date' => now()->addDays(15),
                'end_date' => now()->addDays(28),
                'status_id' => $statusIds[0],
                'created_by' => $userIds[1] ?? $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => $projectIds[1] ?? $projectIds[0],
                'name' => 'Sprint Alpha',
                'start_date' => now(),
                'end_date' => now()->addDays(10),
                'status_id' => $statusIds[1],
                'created_by' => $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
