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
        Schema::create('checklists', function (Blueprint $table) {
            $table->id(); // BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('task_id');
            $table->string('title', 255);
            $table->unsignedBigInteger('created_by');
            $table->timestamps(); // created_at và updated_at

            $table->foreign('task_id')
                  ->references('id')
                  ->on('tasks')
                  ->onDelete('cascade');

            $table->foreign('created_by')
                  ->references('id')
                  ->on('users_scrum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklists');
    }
};
