<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('document_types')->insert([
            [
                'name' => 'Hướng dẫn',
                'description' => 'Các tài liệu hướng dẫn sử dụng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Báo cáo',
                'description' => 'Báo cáo tiến độ dự án hoặc sprint',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Template',
                'description' => 'Các mẫu biểu, template dùng trong dự án',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
