<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users_scrum', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('system_role_id')->default(2);
            $table->unsignedBigInteger('status_id')->default(2);
            $table->timestamps();

            $table->foreign('system_role_id')
                ->references('id')
                ->on('system_roles');

            $table->foreign('status_id')
                ->references('id')
                ->on('user_statuses');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users_scrum');
    }
};
