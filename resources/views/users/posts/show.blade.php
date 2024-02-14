@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
    <div class="row border shadow">
        <div class="col p-0 border-end">
            <img src="{{ $post->image }}" alt="" class="w-100">
        </div>
        <div class="col-4 px-0 bg-white">
            <div class="card border-0">
                <div class="card-header bg-white py-3">
                    <div class="row align-middle-center">
                        <div class="col-auto">
                            {{-- image or icon --}}
                            <a href="#">
                                @if ($post->user->avatar)
                                    <img src="" alt="" class="rounded-circle avatar-sm">
                                @else
                                    <i class="fa-solid fa-circle-user text-secondary avatar-sm"></i>
                                @endif
                            </a>
                        </div>
                        <div class="col ps-0">
                            {{-- name --}}
                            <a href="#" class="text-decoration-none text-dark">{{ $post->user->name }}</a>
                        </div>
                        <div class="col-auto">
                            <div class="dropdown">
                                <button class="btn btn-sm shadow-none" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                <div class="dropdown-menu">
                                    {{-- if youre the user --}}
                                    @if ($post->user->id == Auth::id())
                                        <a href="{{ route('post.edit',$post) }}" class="dropdown-item">
                                            <i class="fa-solid fa-pen-to-square"></i>Edit
                                        </a>
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-post-{{ $post->id }}">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    @else
                                        <form action="#" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="dropwdown-item btn text-danger">Unfollow</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            @include('users.posts.contents.modals.delete')
                        </div>
                    </div>
                </div>
                <div class="card-body w-100">
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
                                    {{ $category_post->category->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- owner + description --}}
                    <a href="#" class="text-decoration-none text-dark fw-bold">{{ $post->user->name }}</a>
                    &nbsp;
                    <p class="d-inline fw-light">{{ $post->description }}</p>
                    <p class="text-muted xsmall">{{ $post->created_at->diffForHumans() }}</p>

                    <div class="mt-3">
                        {{-- show all comments here --}}
                        <ul class="list-group mt-2">
                            @foreach ($post->comments as $comment)
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

                </div>
            </div>
        </div>

    </div>
@endsection
