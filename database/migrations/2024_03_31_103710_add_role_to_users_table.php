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
        // Проверяем, существует ли столбец 'role' в таблице 'users'
        if (!Schema::hasColumn('users', 'role')) {
            // Если столбец не существует, добавляем его с значением по умолчанию 'user'
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('user');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Откатываем миграцию (удаляем столбец 'role' из таблицы 'users')
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
