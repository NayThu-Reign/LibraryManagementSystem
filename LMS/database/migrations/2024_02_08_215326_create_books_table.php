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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('body');
            $table->integer('category_id');
            $table->integer('author_id');
            $table->integer('issued')->default(0);
            $table->timestamps();
        });

        // Schema::table('books', function (Blueprint $table) {
        //     // $table->foreign('category_id')->references('id')->on('categories');
        //     $table->foreign('author_id')->references('id')->on('authors');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
