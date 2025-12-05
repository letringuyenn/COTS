<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskDocumentsSeeder extends Seeder
{
    /**
     * Chạy seeder.
     */
    public function run(): void
    {
        $taskIds = DB::table('tasks')->pluck('id')->toArray();
        $documentIds = DB::table('documents')->pluck('id')->toArray();
        $userIds = DB::table('users_scrum')->pluck('id')->toArray();

        if (empty($taskIds) || empty($documentIds) || empty($userIds)) {
            echo "Vui lòng seed trước bảng tasks, documents và users\n";
            return;
        }

        DB::table('task_documents')->insert([
            [
                'task_id' => $taskIds[0],
                'document_id' => $documentIds[0],
                'attached_at' => now(),
                'attached_by' => $userIds[0],
            ],
            [
                'task_id' => $taskIds[0],
                'document_id' => $documentIds[1] ?? $documentIds[0],
                'attached_at' => now(),
                'attached_by' => $userIds[1] ?? $userIds[0],
            ],
            [
                'task_id' => $taskIds[1] ?? $taskIds[0],
                'document_id' => $documentIds[2] ?? $documentIds[0],
                'attached_at' => now(),
                'attached_by' => $userIds[0],
            ],
        ]);
    }
}
