<?php

namespace Database\Seeders;

use Illuminate\Console\View\Components\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            UserStatusesSeeder::class,
            SystemRolesSeeder::class,
            WorkspaceRolesSeeder::class,
            BoardStatusesSeeder::class,
            TaskStatusesSeeder::class,
            PrioritiesSeeder::class,
            BoardTypesSeeder::class,
            DocumentTypesSeeder::class,
            ReportTypesSeeder::class,

            UsersSeeder::class,
            PasswordResetTokensSeeder::class,
            WorkspacesSeeder::class,
            WorkspaceMembersSeeder::class,

            BoardsSeeder::class,
            TasksSeeder::class,
            TaskAssigneesSeeder::class,
            DailyProgressSeeder::class,
        ]);
    }
}
