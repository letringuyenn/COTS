<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkspaceMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('workspace_members')->insert([
            [
                'user_id' => 1, //Owner
                'workspace_id' => 1,
                'role_id' => 1,
                'joined_at' => now(),
            ],
            [
                'user_id' => 2, //Admin
                'workspace_id' => 1,
                'role_id' => 2,
                'joined_at' => now(),
            ],
            [
                'user_id' => 3, //Member
                'workspace_id' => 1,
                'role_id' => 3,
                'joined_at' => now(),
            ],
        ]);
    }
}
