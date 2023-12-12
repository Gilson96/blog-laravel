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
        Schema::create("comments", function (Blueprint $table) {
            // create the basic comments columns
            $table->id();
            $table->string("email", 100); // use a VARCHAR
            $table->text("comment"); // could be any length
            $table->timestamps();
            // create the article_id column
            $table->foreignId("article_id")->unsigned();
            // set up the foreign key constraint
            // this tells MySQL that the article_id column
            // references the id column on the articles table
            // we also want MySQL to automatically remove any
            // comments linked to articles that are deleted
            $table->foreign("article_id")->references("id")
                ->on("articles")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // removes foreign key constraint
            // make sure it's in an array - for... reasons
            $table->dropForeign(['article_id']);
            // then drops the foreign id column
            $table->dropColumn("article_id");
        });
    }
};
