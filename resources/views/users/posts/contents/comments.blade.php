<div class="mt-3">
    {{-- show all comments here --}}
    <ul class="list-group mt-2">
        @foreach ($post->comments->take(3) as $comment)
            <li class="list-group-item border-0 p-0 mb-2">
                <a href="#" class="text-decoration-none text-dark fw-bold">
                    {{ $post->user->name }}
                </a>
                &nbsp;
                <p class="d-inline fw-light">{{ $comment->body }}</p>
                <form action="{{ route('comment.destroy', $comment) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <span class="text-muted xsmall">{{ $comment->created_at->diffForHumans() }}</span>

                    @if ($comment->user_id == Auth::user()->id)
                        &middot;
                        <button type="submit" class="border-0 bg-transparent text-danger p-0 xsmall">Delete</button>
                    @endif
                </form>
            </li>
            @if ($loop->last AND $post->comments->count() > 3)
                <li class="list-group-item border-0 p-0 mb-2">
                    <a href="{{route('post.show',$post)}}" class="text-decoration-none">View all Comments ({{$post->comments->count()}})</a>
                </li>
            @endif
        @endforeach
    </ul>

    <form action="{{ route('comment.store') }}" method="post">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="input-group">
            <input type="text" name="body" id="" class="form-control form-control-sm">
            <button type="submit" class="btn btn-secondary btn-sm">Post</button>
        </div>
    </form>
</div>
