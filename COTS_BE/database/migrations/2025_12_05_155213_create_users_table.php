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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Tạo cột id với kiểu BIGINT tự động tăng
            $table->string('name'); // Cột name không null
            $table->string('email')->unique(); // Cột email không null và phải là duy nhất
            $table->string('password'); // Cột password không null
            $table->unsignedBigInteger('system_role_id')->default(2); // Cột system_role_id không null với giá trị mặc định là 2
            $table->unsignedBigInteger('status_id')->default(2); // Cột status_id không null với giá trị mặc định là 2
            $table->timestamp('email_verified_at')->nullable(); // Cột email_verified_at có thể null
            $table->timestamps(); // Tạo cột created_at và updated_at

            $table->foreign('system_role_id')->references('id')->on('system_roles'); // Ràng buộc khóa ngoại
            $table->foreign('status_id')->references('id')->on('user_statuses'); // Ràng buộc khóa ngoại
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
