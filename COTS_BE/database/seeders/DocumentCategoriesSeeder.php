<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo các danh mục cha
        $generalId = DB::table('document_categories')->insertGetId([
            'name' => 'Tài liệu chung',
            'description' => 'Các tài liệu tổng hợp dùng chung trong workspace',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $projectId = DB::table('document_categories')->insertGetId([
            'name' => 'Tài liệu dự án',
            'description' => 'Tập hợp tài liệu thuộc từng dự án',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo danh mục con
        DB::table('document_categories')->insert([
            [
                'name' => 'Tài liệu kỹ thuật',
                'description' => 'Spec, API document, technical guide…',
                'parent_id' => $projectId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tài liệu cuộc họp',
                'description' => 'Meeting note, biên bản họp',
                'parent_id' => $generalId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Báo cáo dự án',
                'description' => 'Report tiến độ Sprint / tháng',
                'parent_id' => $projectId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
