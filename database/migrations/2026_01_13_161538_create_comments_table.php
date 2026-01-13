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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // связывает с users.id, при удалении пользователя удаляет комментарии

            $table->foreignId('news_id')->constrained()->onDelete('cascade');
            // связывает с news.id, при удалении новости удаляет комментарии

            $table->text('content'); // текст комментария

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }

};
