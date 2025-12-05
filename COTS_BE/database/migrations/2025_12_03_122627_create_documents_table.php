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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('file_path', 255)->nullable();
            $table->string('external_url', 255)->nullable();

            // FIX: phải cùng kiểu với document_types.id
            $table->unsignedBigInteger('type_id');

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('type_id')
                ->references('id')->on('document_types');

            $table->foreign('category_id')
                ->references('id')->on('document_categories');

            $table->foreign('created_by')
                ->references('id')->on('users_scrum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
