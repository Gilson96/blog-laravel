<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\API\ArticleRequest;
use App\Http\Resources\API\ArticleResource;
use App\Http\Resources\API\ArticleListResource;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\API\CommentResource;

class Articles extends Controller
{

    public function index()
    {
        // needs to return multiple articles
        // so we use the collection method
        return ArticleListResource::collection(Article::all());
    }


    public function store(Request $request)
    {
        $data = $request->all();
        // store article in variable
        $article = Article::create($data);
        // return the resource
        return new ArticleResource($article);
    }



    // the article gets passed in for us
    // using Route Model Binding
    public function show(Article $article)
    {
        // return the resource
        return new ArticleResource($article);
    }

    // request is passed in because we ask for it with type hinting
    // and the URL parameter is always passed in
    public function update(Request $request, Article $article)
    {
        $data = $request->all();
        $article->update($data);
        // return the resource
        return new ArticleResource($article);
    }



    public function destroy(Article $article)
    {
        // delete the article from the DB
        $article->delete();
        // use a 204 code as there is no content in the response
        return response(null, 204);
    }

    

    public function showComment()
    {

        
        return CommentResource::collection(Comment::all());
    }

    public function createComment(Article $article)
    {
        return view('/comments/form', ["article" => $article]);
    }

    public function commentPost(CommentRequest $request, Article $article)
    {
        $comment = new Comment($request->all());

        $article->comments()->save($comment);
        return redirect("/articles/{$article->id}");
    }

    public function commentDestroy(Article $article)
    {
        $comment = $article->comments();
        $comment->delete();

        return redirect("/articles/{$article->id}");
    }

}