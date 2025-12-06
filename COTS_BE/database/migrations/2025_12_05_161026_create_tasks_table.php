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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Tạo cột id với kiểu tự động tăng
            $table->string('title'); // Cột title không null
            $table->text('description')->nullable(); // Cột description có thể null
            $table->unsignedBigInteger('priority_id')->default(2); // Cột priority_id không null với giá trị mặc định là 2
            $table->unsignedBigInteger('status_id')->default(1); // Cột status_id không null với giá trị mặc định là 1
            $table->decimal('estimated_hours', 5, 2)->nullable(); // Cột estimated_hours có thể null
            $table->decimal('actual_hours', 5, 2)->nullable(); // Cột actual_hours có thể null
            $table->date('start_date')->nullable(); // Cột start_date có thể null
            $table->date('due_date')->nullable(); // Cột due_date có thể null
            $table->timestamp('completed_at')->nullable(); // Cột completed_at có thể null
            $table->timestamp('approved_at')->nullable(); // Cột approved_at có thể null
            $table->unsignedBigInteger('approved_by')->nullable(); // Cột approved_by có thể null
            $table->unsignedBigInteger('board_id'); // Cột board_id không null
            $table->unsignedBigInteger('created_by'); // Cột created_by không null
            $table->timestamps(); // Tạo cột created_at và updated_at

            // Ràng buộc khóa ngoại
            $table->foreign('priority_id')->references('id')->on('priorities');
            $table->foreign('status_id')->references('id')->on('task_statuses');
            $table->foreign('approved_by')->references('id')->on('users');
            $table->foreign('board_id')->references('id')->on('boards')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
