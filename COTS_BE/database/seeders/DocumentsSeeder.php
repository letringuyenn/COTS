<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentsSeeder extends Seeder
{
    /**
     * Chạy seeder.
     */
    public function run(): void
    {
        $userIds = DB::table('users_scrum')->pluck('id')->toArray();
        $typeIds = DB::table('document_types')->pluck('id')->toArray();
        $categoryIds = DB::table('document_categories')->pluck('id')->toArray();

        if (empty($userIds) || empty($typeIds) || empty($categoryIds)) {
            echo "Vui lòng seed trước users, document_types và document_categories\n";
            return;
        }

        DB::table('documents')->insert([
            [
                'title' => 'Tài liệu hướng dẫn Scrum',
                'description' => 'Hướng dẫn sử dụng Scrum trong dự án',
                'file_path' => 'documents/scrum_guide.pdf',
                'external_url' => null,
                'type_id' => $typeIds[0],
                'category_id' => $categoryIds[0],
                'created_by' => $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Báo cáo tiến độ Sprint 1',
                'description' => 'Báo cáo tổng hợp tiến độ Sprint 1',
                'file_path' => 'documents/sprint1_report.pdf',
                'external_url' => null,
                'type_id' => $typeIds[1] ?? $typeIds[0],
                'category_id' => $categoryIds[1] ?? $categoryIds[0],
                'created_by' => $userIds[1] ?? $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mẫu template task',
                'description' => 'Template tạo task mới',
                'file_path' => null,
                'external_url' => 'https://example.com/task_template',
                'type_id' => $typeIds[0],
                'category_id' => $categoryIds[0],
                'created_by' => $userIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
