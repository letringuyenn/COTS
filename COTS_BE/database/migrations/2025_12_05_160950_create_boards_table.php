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
        Schema::create('boards', function (Blueprint $table) {
            $table->id(); // Tạo cột id với kiểu tự động tăng
            $table->string('name'); // Cột name không null
            $table->unsignedBigInteger('type_id')->default(1); // Cột type_id không null với giá trị mặc định là 1
            $table->unsignedBigInteger('status_id')->default(1); // Cột status_id không null với giá trị mặc định là 1
            $table->date('start_date')->nullable(); // Cột start_date có thể null
            $table->date('end_date')->nullable(); // Cột end_date có thể null
            $table->unsignedBigInteger('workspace_id'); // Cột workspace_id không null
            $table->unsignedBigInteger('created_by'); // Cột created_by không null
            $table->timestamps(); // Tạo cột created_at và updated_at

            // Ràng buộc khóa ngoại
            $table->foreign('type_id')->references('id')->on('board_types');
            $table->foreign('status_id')->references('id')->on('board_statuses');
            $table->foreign('workspace_id')->references('id')->on('workspaces')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boards');
    }
};
