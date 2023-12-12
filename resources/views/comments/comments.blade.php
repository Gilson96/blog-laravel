<h3 class="card-body">Comments</h3>
<hr />
{{-- if an article has comments list them  --}}
@if ($article->comments->isNotEmpty())
    <div class="ml-4 ">
        @foreach ($article->comments as $id => $comment)
            <div class="comments mb-2 d-flex flex-column  w-100 list-group-item " style="gap: 10px">
                <h5 class=" mb-1 mr-2 font-weight-bold">{{ $comment->email }}</h5>

                <p class="mb-1 font-italic font-weight-light"><span class="">comment:</span> "{{ $comment->comment }}"
                </p>
                <a href="comments/destroy/{{ $article->id }}"><button type="button" class="btn btn-danger">Delete Comment</button></a>
            </div>
        @endforeach

    </div>
@else
    <p class="alert alert-secondary">No comments found</p>

@endif
<a href="comments/{{ $article->id }}"><button type="button" class="ml-4 mb-4 btn btn-success">Create Comment</button></a>
</div>
