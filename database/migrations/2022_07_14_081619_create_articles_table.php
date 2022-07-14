<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->json('title');
            $table->json('content');
            $table->json('short_content')->nullable();
            $table->boolean('active')->default(0);
            $table->boolean('pinned')->default(0);
            $table->timestamp('published_at')->useCurrent();
            $table->timestamps();

            $table->index('slug');
            $table->index('active');
            $table->index('pinned');
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
