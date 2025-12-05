<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('report_types')->insert([
            [
                'name' => 'Sprint Report',
                'description' => 'Tổng hợp kết quả Sprint: user story hoàn thành, burndown chart, velocity.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Burndown Chart',
                'description' => 'Biểu đồ burndown theo dõi tiến độ trong Sprint.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Velocity Report',
                'description' => 'Báo cáo tổng số story point hoàn thành trong các Sprint.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
