<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cms_blog_category_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('blog_id')->references('id')->on('cms_blogs')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('cms_blog_categories')->onDelete('cascade');

            $table->unique(['blog_id', 'category_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cms_blog_category_pivot');
    }
};
