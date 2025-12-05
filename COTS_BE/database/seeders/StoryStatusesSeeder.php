<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoryStatusesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('story_statuses')->insert([
            ['name' => 'To Do', 'description' => 'Chưa bắt đầu', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'In Progress', 'description' => 'Đang thực hiện', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Done', 'description' => 'Hoàn thành', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
