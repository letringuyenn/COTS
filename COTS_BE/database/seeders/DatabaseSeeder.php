<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // 1. Hệ thống cơ bản
            SystemRolesSeeder::class,
            UserStatusesSeeder::class,
            TaskStatusesSeeder::class,
            StoryStatusesSeeder::class,
            PrioritiesSeeder::class,
            ReportTypesSeeder::class,

            // 2. Người dùng & phân quyền
            UsersScrumSeeder::class,

            // 3. Workspace setup
            WorkspacesSeeder::class,
            WorkspaceRolesSeeder::class,
            WorkspaceMembersSeeder::class,

            // 4. Dự án & quy trình Agile
            ProjectsSeeder::class,
            SprintsSeeder::class,
            UserStoriesSeeder::class,

            // 5. Tasks & liên kết liên quan
            TasksSeeder::class,
            TaskAssigneesSeeder::class,
            TaskDocumentsSeeder::class,

            // 6. Checklist
            ChecklistsSeeder::class,
            ChecklistItemsSeeder::class,

            // 7. Tài liệu (Documents)
            DocumentTypesSeeder::class,
            DocumentCategoriesSeeder::class,
            DocumentsSeeder::class,

            // 8. Log cuối
            DailyLogsSeeder::class,
        ]);
    }
}
