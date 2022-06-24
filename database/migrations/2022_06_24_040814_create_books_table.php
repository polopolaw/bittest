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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('desc');
            $table->integer('year');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();

            $table->index('author_id', 'book_author_idx');
            $table->foreign('author_id', 'book_author_fk')->on('authors')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
