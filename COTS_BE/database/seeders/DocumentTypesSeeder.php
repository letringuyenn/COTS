<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypesSeeder extends Seeder
{
    public function run(): void
    {
        $documentTypes = [
            [
                'name' => 'requirement',
                'description' => 'Yêu cầu',
            ],
            [
                'name' => 'design',
                'description' => 'Thiết kế',
            ],
            [
                'name' => 'technical',
                'description' => 'Kỹ thuật',
            ],
            [
                'name' => 'testing',
                'description' => 'Kiểm thử',
            ],
            [
                'name' => 'guide',
                'description' => 'Hướng dẫn',
            ],
            [
                'name' => 'meeting_note',
                'description' => 'Ghi chú họp',
            ],
        ];

        // Xóa dữ liệu cũ trước khi thêm mới
        DB::table('document_types')->truncate();
        DB::table('document_types')->delete();

        // Thêm dữ liệu mới
        DB::table('document_types')->insert($documentTypes);
    }
}
