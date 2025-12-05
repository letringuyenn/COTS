<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritiesSeeder extends Seeder
{
    public function run(): void
    {
        $priorities = [
            [
                'name' => 'low',
                'description' => 'Thấp',
            ],
            [
                'name' => 'medium',
                'description' => 'Trung bình',
            ],
            [
                'name' => 'high',
                'description' => 'Cao',
            ],
            [
                'name' => 'critical',
                'description' => 'Khẩn cấp',
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('priorities')->delete();

        // Thêm dữ liệu mới
        DB::table('priorities')->insert($priorities);
    }
}
