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
    Schema::create('articles', function (Blueprint $table) {
        $table->id();
        $table->string('title');            // Заголовок новости
        $table->text('short_description');  // Краткое описание
        $table->text('full_text');          // Полный текст статьи
        $table->string('preview_image')->nullable(); // Путь к картинке-превью
        $table->timestamps();               // Поля created_at и updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
