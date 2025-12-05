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
        Schema::create('sprints', function (Blueprint $table) {
            $table->id(); // BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('project_id');
            $table->string('name', 255);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->tinyInteger('status_id')->default(1);
            $table->unsignedBigInteger('created_by');
            $table->timestamps(); // created_at và updated_at

            $table->foreign('project_id')
                  ->references('id')
                  ->on('projects')
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
        Schema::dropIfExists('sprints');
    }
};
