<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // No-op duplicate migration. The `users_scrum` table is created by
        // the earlier migration `2025_12_02_170631_create_users_scrum_table.php`.
    }

    public function down(): void
    {
        // Intentionally left empty to avoid dropping the table created by the
        // earlier migration.
    }
};
