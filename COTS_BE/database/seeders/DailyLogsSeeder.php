<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailyLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('daily_logs')->insert([
            [
                'task_id' => 1,
                'user_id' => 1,
                'log_date' => now()->subDays(2)->toDateString(),
                'hours_worked' => 3.5,
                'progress_percentage' => 30,
                'notes' => 'Initial setup and planning.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_id' => 1,
                'user_id' => 1,
                'log_date' => now()->subDay()->toDateString(),
                'hours_worked' => 4.0,
                'progress_percentage' => 55,
                'notes' => 'Worked on API integration.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_id' => 1,
                'user_id' => 2,
                'log_date' => now()->toDateString(),
                'hours_worked' => 2.5,
                'progress_percentage' => 60,
                'notes' => 'Frontend layout adjustments.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
