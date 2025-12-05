<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_statuses', function (Blueprint $table) {
            $table->id(); // Tạo cột id với kiểu BIGINT tự động tăng
            $table->string('name'); // Cột name không null
            $table->text('description')->nullable(); // Cột description có thể null
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_statuses');
    }
};
