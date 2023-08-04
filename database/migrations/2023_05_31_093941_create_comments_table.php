<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment');
            $table->string('approved_by');
            $table->string('image_path');
            $table->unsignedBigInteger('blog_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('reply_to')->nullable();
            $table->timestamps();

            $table->foreign('blog_id')
                ->references('id')
                ->on('blogs')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('reply_to')
                ->references('id')
                ->on('comments')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
