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
        Schema::create('checklist_items', function (Blueprint $table) {
            $table->id(); // BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('checklist_id');
            $table->text('description');
            $table->boolean('is_completed')->default(false);
            $table->unsignedBigInteger('completed_by')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps(); // created_at và updated_at

            $table->foreign('checklist_id')
                  ->references('id')
                  ->on('checklists')
                  ->onDelete('cascade');

            $table->foreign('completed_by')
                  ->references('id')
                  ->on('users_scrum');

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
        Schema::dropIfExists('checklist_items');
    }
};
