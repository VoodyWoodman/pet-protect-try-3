<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
         * id - автоинкрементируемый индентификатор;
         * user_id - идентифификатор пользователя, ссылающийся на таблицу 'users';
         * filename - уникальное имя файла сервера;
         * timestamps - столбцы для временных меток created_at и updated_at;
         * <- Удаление каскадом всех аватаров пользователя
    */


    public function up(): void
    {
        Schema::create('avatars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('filename')->unique();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('avatar_path')->nullable()->unique()->after('filename');

        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar_path')->nullable()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avatars');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar_path');
        });
    }
};
