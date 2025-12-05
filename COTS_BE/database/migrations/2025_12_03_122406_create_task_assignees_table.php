<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_assignees', function (Blueprint $table) {
            $table->id(); // BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('assigned_at')->useCurrent();
            $table->unsignedBigInteger('assigned_by');

            $table->unique(['task_id', 'user_id']);

            $table->foreign('task_id')
                  ->references('id')
                  ->on('tasks')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users_scrum')
                  ->onDelete('cascade');

            $table->foreign('assigned_by')
                ->references('id')
                ->on('users_scrum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_assignees');
    }
};
