@extends('app')
@section('content')
    <form class="form-control" method="post">
        @csrf
        <h2 class="card-header">Create Article</h2>
        <fieldset class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" name="title" class="form-control" value="{{ old('title') }}" />
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control">{{ old('content') }}</textarea>
            </div>
        </fieldset>
        @error('title')
            <p class="invalid-feedback">
                {{ $message }}
            </p>
        @enderror

        <div class="card-footer text-right">
            <button class="btn btn-success">Create</button>
            
        </div>
    </form>
    <div class="card-footer text-right">
    <a href="/"><button class="btn btn-success">back</button></a>
    </div>
@endsection
