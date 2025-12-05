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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('workspace_id');
            $table->unsignedBigInteger('sprint_id')->nullable();
            $table->unsignedBigInteger('generated_by');
            $table->string('file_path', 255);
            $table->timestamp('generated_at')->useCurrent();
            $table->timestamps();
            $table->index(['workspace_id', 'type_id']);
            $table->index('sprint_id');
            $table->foreign('type_id')
                  ->references('id')
                  ->on('report_types')
                  ->onDelete('restrict');
            $table->foreign('workspace_id')
                  ->references('id')
                  ->on('workspaces')
                  ->onDelete('cascade');

            $table->foreign('sprint_id')
                  ->references('id')
                  ->on('sprints')
                  ->onDelete('set null');

            $table->foreign('generated_by')
                  ->references('id')
                  ->on('users_scrum')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
