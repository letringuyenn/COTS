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
        Schema::create('workspace_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('workspace_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamp('joined_at')->useCurrent();

            $table->unique(['workspace_id', 'user_id']);

            $table->foreign('workspace_id')
                ->references('id')
                ->on('workspaces')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users_scrum')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('workspace_roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspace_members');
    }
};
