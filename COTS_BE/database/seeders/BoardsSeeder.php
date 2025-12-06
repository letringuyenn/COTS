<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardsSeeder extends Seeder
{
    public function run(): void
    {
        $boards = [
            [
                'name' => 'Default Board',
                'type_id' => 1, // board
                'status_id' => 1, // planning
                'start_date' => now()->toDateString(),
                'end_date' => null,
                'workspace_id' => 1, // Giả sử workspace mặc định có id = 1
                'created_by' => 1,   // Giả sử admin có id = 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sprint 1',
                'type_id' => 2, // sprint
                'status_id' => 2, // active
                'start_date' => now()->toDateString(),
                'end_date' => now()->addDays(14)->toDateString(),
                'workspace_id' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('boards')->delete();

        // Thêm dữ liệu mới
        DB::table('boards')->insert($boards);
    }
}
