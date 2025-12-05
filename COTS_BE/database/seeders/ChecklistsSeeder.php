<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChecklistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('checklists')->insert([
            [
                'task_id' => 1,
                'title' => 'Phân tích yêu cầu',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_id' => 1,
                'title' => 'Thiết kế UI/UX',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_id' => 1,
                'title' => 'Xây API backend',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
