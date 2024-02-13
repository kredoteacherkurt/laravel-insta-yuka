@extends('layouts.app')

@section('content')
<div class="row gx-5">
    <div class="col-8">
        @forelse ($all_posts as $post)
            <div class="card mb-4">
                @include('users.posts.contents.header')
                @include('users.posts.contents.body')
            </div>
        @empty

        @endforelse
    </div>
    <div class="col-4 bg-secondary">Suggested users</div>
</div>
@endsection
