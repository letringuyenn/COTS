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
        Schema::create('daily_logs', function (Blueprint $table) {
            $table->id(); // BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('user_id');
            $table->date('log_date');
            $table->decimal('hours_worked', 4, 2)->default(0);
            $table->tinyInteger('progress_percentage')->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->unique(['task_id', 'user_id', 'log_date']);

            $table->foreign('task_id')
                  ->references('id')
                  ->on('tasks')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users_scrum')
                  ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_logs');
    }
};
