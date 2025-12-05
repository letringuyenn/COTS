<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_stories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->tinyInteger('story_point')->default(1);
            $table->unsignedBigInteger('status_id')->default(1);
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('project_id')
                  ->references('id')
                  ->on('projects')
                  ->onDelete('cascade');

            $table->foreign('status_id')
                  ->references('id')
                  ->on('story_statuses');

            $table->foreign('created_by')
                  ->references('id')
                  ->on('users_scrum')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_stories');
    }
};
