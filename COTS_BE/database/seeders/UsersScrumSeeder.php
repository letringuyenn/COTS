<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersScrumSeeder extends Seeder
{
    /**
     * Chạy seeder.
     */
    public function run(): void
    {
        $roleIds = DB::table('system_roles')->pluck('id')->toArray();
        $statusIds = DB::table('user_statuses')->pluck('id')->toArray();

        if(empty($roleIds) || empty($statusIds)) {
            echo "Vui lòng seed trước bảng system_roles và user_statuses\n";
            return;
        }

        DB::table('users_scrum')->insert([
            [
                'name' => 'Nguyễn Văn A',
                'email' => 'a@example.com',
                'password' => 123456,
                'system_role_id' => $roleIds[0] ?? 2,
                'status_id' => $statusIds[0] ?? 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Trần Thị B',
                'email' => 'b@example.com',
                'password' => 123456,
                'system_role_id' => $roleIds[1] ?? 2,
                'status_id' => $statusIds[0] ?? 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lê Văn C',
                'email' => 'c@example.com',
                'password' => 123456,
                'system_role_id' => $roleIds[1] ?? 2,
                'status_id' => $statusIds[1] ?? 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
