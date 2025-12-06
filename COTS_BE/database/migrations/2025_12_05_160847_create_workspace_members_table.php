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
        Schema::create('workspace_members', function (Blueprint $table) {
            $table->id(); // Tạo cột id với kiểu tự động tăng
            $table->unsignedBigInteger('workspace_id'); // Cột workspace_id không null
            $table->unsignedBigInteger('user_id'); // Cột user_id không null
            $table->unsignedBigInteger('role_id'); // Cột role_id không null
            $table->timestamp('joined_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP')); // Cột joined_at có thể null với giá trị mặc định là thời gian hiện tại

            $table->foreign('workspace_id')->references('id')->on('workspaces')->onDelete('cascade'); // Ràng buộc khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Ràng buộc khóa ngoại
            $table->foreign('role_id')->references('id')->on('workspace_roles'); // Ràng buộc khóa ngoại
            $table->unique(['workspace_id', 'user_id']); // Ràng buộc duy nhất cho cặp workspace_id và user_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspace_members');
    }
};
