@extends('app')
@section('content')
    <a href="articles/create"><button type="button" class="mb-4 btn btn-success">Create Article</button></a>

    <div class="list-group">
        {{-- loop over all of the articles  }
        { each article object goes into $article  --}}
        @foreach (App\Models\Article::all() as $article)
            {{-- pass-through $article as "article" --}}

            @include('partials/list-item', ['article' => $article])
        @endforeach

    </div>
@endsection
