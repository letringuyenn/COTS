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
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('workspace_id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps(); // tạo created_at và updated_at

            $table->foreign('workspace_id')
                  ->references('id')
                  ->on('workspaces')
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
        Schema::dropIfExists('projects');
    }
};
