@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    @include('users.profile.header')

    {{-- Show all posts here --}}
    <div style="margin-top: 100px">
        @if ($user->posts->isNotEmpty())
            <div class="row">
                @foreach ($user->posts as $post)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="{{ route('post.show', $post) }}">
                            <img src="{{ $post->image }}" class="img-thumbnail" alt="{{ $post->id }}">
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <h3 class="text-center text-muted">No posts yet.</h3>
        @endif
    </div>
@endsection
