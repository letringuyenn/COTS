<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class PrioritiesSeeder extends Seeder
{
    /**
     * Chạy seeder.
     */
    public function run(): void
    {
        DB::table('priorities')->insert([
            [
                'name' => 'Thấp',
                'description' => 'Công việc có mức độ ưu tiên thấp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Trung bình',
                'description' => 'Công việc có mức độ ưu tiên trung bình',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cao',
                'description' => 'Công việc có mức độ ưu tiên cao',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Khẩn cấp',
                'description' => 'Công việc cần xử lý ngay lập tức',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
