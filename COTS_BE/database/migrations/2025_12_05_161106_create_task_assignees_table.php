<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_assignees', function (Blueprint $table) {
            $table->id(); // Tạo cột id với kiểu tự động tăng
            $table->unsignedBigInteger('task_id'); // Cột task_id không null
            $table->unsignedBigInteger('user_id'); // Cột user_id không null
            $table->timestamp('assigned_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP')); // Cột assigned_at có thể null với giá trị mặc định là thời gian hiện tại
            $table->unsignedBigInteger('assigned_by'); // Cột assigned_by không null

            // Ràng buộc khóa ngoại
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('assigned_by')->references('id')->on('users');
            $table->unique(['task_id', 'user_id']); // Ràng buộc duy nhất cho cặp task_id và user_id
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
