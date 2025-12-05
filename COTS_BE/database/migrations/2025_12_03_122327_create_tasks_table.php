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
            $table->id();
            $table->string('title', 255);
            $table->text('description')->nullable();

            // FIX ở đây
            $table->unsignedBigInteger('priority_id')->default(2);

            $table->unsignedBigInteger('status_id')->default(1);
            $table->decimal('estimated_hours', 5, 2)->nullable();
            $table->decimal('actual_hours', 5, 2)->nullable();
            $table->date('start_date')->nullable();
            $table->date('due_date')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->unsignedBigInteger('user_story_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('priority_id')->references('id')->on('priorities');
            $table->foreign('status_id')->references('id')->on('task_statuses');
            $table->foreign('approved_by')->references('id')->on('users_scrum');
            $table->foreign('user_story_id')->references('id')->on('user_stories')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users_scrum');
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
