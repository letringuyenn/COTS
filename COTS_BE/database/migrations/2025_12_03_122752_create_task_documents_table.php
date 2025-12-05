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
        Schema::create('task_documents', function (Blueprint $table) {
            $table->id(); // BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('document_id');
            $table->timestamp('attached_at')->useCurrent();
            $table->unsignedBigInteger('attached_by');

            $table->unique(['task_id', 'document_id']);

            $table->foreign('task_id')
                  ->references('id')
                  ->on('tasks')
                  ->onDelete('cascade');

            $table->foreign('document_id')
                  ->references('id')
                  ->on('documents')
                  ->onDelete('cascade');

            $table->foreign('attached_by')
                  ->references('id')
                  ->on('users_scrum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_documents');
    }
};
