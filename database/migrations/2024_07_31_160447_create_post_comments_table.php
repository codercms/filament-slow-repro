<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('author_id');
            $table->bigInteger('post_id');
            $table->text('comment');
            $table->timestamps();

            $table
                ->foreign(['author_id'])
                ->references(['id'])
                ->on('users');
            $table
                ->foreign(['post_id'])
                ->references(['id'])
                ->on('posts');

            $table->index(['post_id']);
            $table->index(['author_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_comments');
    }
};
