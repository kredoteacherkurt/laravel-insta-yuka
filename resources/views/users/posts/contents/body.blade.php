<div class="container">
    <a href="{{ route('post.show', $post) }}">
        <img src="{{ $post->image }}" alt="" class="w-100">
    </a>
</div>
<div class="card-body">
    <div class="row align-items-center">
        <div class="col-auto">
            {{-- heart icon --}}
            <form action="" method="post">
                @csrf
                <button type="submit" class="btn shadow-none" style="font-size: 30px">
                    <i class="fa-regular fa-heart p-0"></i>
                </button>
            </form>
        </div>
        <div class="col-auto px-0">
            {{-- counter --}}
            <span>3</span>
        </div>

        <div class="col text-end">
            {{-- categories --}}
            @foreach ($post->categoryPost as $category_post)
                <div class="badge bg-secondary bg-opacity-50">
                    {{$category_post->category->name}}
                </div>
            @endforeach
        </div>
    </div>
    {{-- owner + description --}}
    <a href="#" class="text-decoration-none text-dark fw-bold">{{$post->user->name}}</a>
    &nbsp;
    <p class="d-inline fw-light">{{$post->description}}</p>
    <p class="text-muted xsmall">{{$post->created_at->diffForHumans()}}</p>
    @include('users.posts.contents.comments')
</div>
