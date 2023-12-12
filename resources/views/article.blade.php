@extends('app')
@section('content')

    <div class="card">
        <h2 class="card-header">{{ $article->title }}</h2>
        <article class="card-body">
            {{ $article->content }}
        </article>
        <hr />

        
       @include('./comments/comments')

       

    {{-- buttons --}}
        <a href="destroy/{{ $article->id }}"><button type="button" class="mt-4 btn btn-danger">Delete Article</button></a>
        <a href="edit/{{ $article->id }}"><button type="button" class="mt-4 btn btn-warning">Update Article</button></a>
        <a href="/"><button class="mt-4 btn btn-success">back</button></a>
@endsection
