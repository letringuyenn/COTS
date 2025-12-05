<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChecklistItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('checklist_items')->insert([
            [
                'checklist_id' => 1,
                'description' => 'Thu thập yêu cầu từ khách hàng',
                'is_completed' => false,
                'completed_by' => null,
                'completed_at' => null,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'checklist_id' => 1,
                'description' => 'Phân tích tính năng và nghiệp vụ',
                'is_completed' => false,
                'completed_by' => null,
                'created_by' => 1,
                'completed_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'checklist_id' => 1,
                'description' => 'Viết tài liệu SRS',
                'is_completed' => true,
                'completed_by' => 1,
                'completed_at' => now(),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
