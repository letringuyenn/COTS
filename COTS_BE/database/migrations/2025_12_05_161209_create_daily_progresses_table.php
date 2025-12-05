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
        Schema::create('daily_progress', function (Blueprint $table) {
            $table->id(); // Tạo cột id với kiểu tự động tăng
            $table->unsignedBigInteger('task_id'); // Cột task_id không null
            $table->unsignedBigInteger('user_id'); // Cột user_id không null
            $table->date('date'); // Cột date không null
            $table->decimal('hours_worked', 4, 2)->default(0); // Cột hours_worked không null với giá trị mặc định là 0
            $table->integer('progress_percentage')->default(0); // Cột progress_percentage không null với giá trị mặc định là 0
            $table->text('notes')->nullable(); // Cột notes có thể null
            $table->timestamps(); // Tạo cột created_at và updated_at

            // Ràng buộc khóa ngoại
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['task_id', 'user_id', 'date']); // Ràng buộc duy nhất cho cặp task_id, user_id và date
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_progress');
    }
};
