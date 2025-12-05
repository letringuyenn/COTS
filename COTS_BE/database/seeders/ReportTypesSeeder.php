<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportTypesSeeder extends Seeder
{
    public function run(): void
    {
        $reportTypes = [
            [
                'name' => 'sprint_report',
                'description' => 'Báo cáo Sprint',
            ],
            [
                'name' => 'task_report',
                'description' => 'Báo cáo Task',
            ],
            [
                'name' => 'progress_report',
                'description' => 'Báo cáo tiến độ',
            ],
            [
                'name' => 'timesheet',
                'description' => 'Bảng chấm công',
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('report_types')->truncate();
        DB::table('report_types')->delete();

        // Thêm dữ liệu mới
        DB::table('report_types')->insert($reportTypes);
    }
}
