<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class TaskStatusesSeeder extends Seeder
{
    /**
     * Chạy seeder.
     */
    public function run(): void
    {
        DB::table('task_statuses')->insert([
            [
                'name' => 'Mới tạo',
                'description' => 'Task vừa được tạo và chưa xử lý',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Đang thực hiện',
                'description' => 'Task đang được xử lý bởi nhân viên',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tạm dừng',
                'description' => 'Task tạm thời bị hoãn lại',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hoàn thành',
                'description' => 'Task đã xử lý xong',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Đã hủy',
                'description' => 'Task bị hủy bỏ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
