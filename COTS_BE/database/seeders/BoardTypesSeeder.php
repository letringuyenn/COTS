<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardTypesSeeder extends Seeder
{
     public function run(): void
    {
        $boardTypes = [
            [
                'name' => 'board',
                'description' => 'Bảng công việc thông thường',
            ],
            [
                'name' => 'sprint',
                'description' => 'Sprint',
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('board_types')->delete();

        // Thêm dữ liệu mới
        DB::table('board_types')->insert($boardTypes);
    }
}
