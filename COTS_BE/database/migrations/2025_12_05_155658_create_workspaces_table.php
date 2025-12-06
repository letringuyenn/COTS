<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workspaces', function (Blueprint $table) {
            $table->id(); // Tạo cột id với kiểu BIGINT tự động tăng
            $table->string('name'); // Cột name không null
            $table->text('description')->nullable(); // Cột description có thể null
            $table->unsignedBigInteger('created_by'); // Cột created_by kiểu int không null
            $table->timestamps(); // Tạo cột created_at và updated_at

            $table->foreign('created_by')->references('id')->on('users'); // Ràng buộc khóa ngoại
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workspaces');
    }
};
