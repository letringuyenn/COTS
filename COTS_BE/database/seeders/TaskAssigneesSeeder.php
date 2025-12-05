<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskAssigneesSeeder extends Seeder
{
    /**
     * Chạy seeder.
     */
    public function run(): void
    {
        $userIds = DB::table('users_scrum')->pluck('id')->toArray();
        $taskIds = DB::table('tasks')->pluck('id')->toArray();

        if(empty($userIds) || empty($taskIds)) {
            echo "Vui lòng seed trước bảng users và tasks\n";
            return;
        }

        DB::table('task_assignees')->insert([
            [
                'task_id' => $taskIds[0],
                'user_id' => $userIds[0],
                'assigned_at' => now(),
                'assigned_by' => $userIds[1] ?? $userIds[0],
            ],
            [
                'task_id' => $taskIds[0],
                'user_id' => $userIds[1],
                'assigned_at' => now(),
                'assigned_by' => $userIds[0],
            ],
            [
                'task_id' => $taskIds[1],
                'user_id' => $userIds[1],
                'assigned_at' => now(),
                'assigned_by' => $userIds[0],
            ],
            [
                'task_id' => $taskIds[2],
                'user_id' => $userIds[2] ?? $userIds[0],
                'assigned_at' => now(),
                'assigned_by' => $userIds[1] ?? $userIds[0],
            ],
        ]);
    }
}
