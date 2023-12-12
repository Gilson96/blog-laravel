<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;


class Articles extends Controller
{
    public function index(Article $article)
    {
        return view("welcome", [
            // pass in all the articles
            "articles" => Article::all(),
        ]);

    }

    public function show(Article $article)
    {
        return view("article", [
            "article" => $article

        ]);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect("/");
    }

    public function edit(Article $article)
    {
        return view("edit", [
            "article" => $article

        ]);
    }



    public function update(Request $request, Article $article)
    {

        $data = $request->all();
        $article->update($data);
        return redirect("/articles/{$article->id}");
    }

    public function create()
    {
        return view("form");
    }


    // accept the Request object
    // this gives us access to the submitted data
    public function createPost(ArticleRequest $request)
    {
        // get all of the submitted data
        $data = $request->all();
        // create a new article, passing in the submitted data
        $article = Article::create($data);
        // redirect the browser to the new article
        return redirect("/articles/{$article->id}");
    }


    public function createComment(Article $article)
    {
        return view('/comments/form', ["article" => $article]);
    }

    // we need to accept Request first, using type hinting
    // and then use route model binding to get the relevant
    // article from the URL parameter
    public function commentPost(CommentRequest $request, Article $article)
    {
        // create a new comment, passing in the data from the request JSON
        $comment = new Comment($request->all());
        // this syntax is a bit odd, but it's in the documentation
        // stores the comment in the DB while setting the article_id
        $article->comments()->save($comment);
        // return the stored comment
        return redirect("/articles/{$article->id}");
    }

    public function commentDestroy(Article $article)
    {
        $comment = $article->comments();
        $comment->delete();

        return redirect("/articles/{$article->id}");
    }
}