@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
        {{-- update profile --}}
        <div class="row justify-content-center">
        <form action="{{ route('profile.update') }}" method="POST" class="bg-white shadow rounded-3 p-5" enctype="multipart/form-data">

            @csrf
            @method('PATCH')

            <h2 class=" mb-3 text-muted">Edit Profile</h2>

            <div class="row mb-3">
                <div class="col-4">
                    @if ($user->avatar)
                        <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="img-thumbnail rounded-circle d-block mx-auto avatar-lg">
                    @else
                        <i class="fa-solid fa-circle-user text-secondary icon-lg d-block text-center"></i>
                    @endif
                </div>
                <div class="col-auto align-self-center">
                    <input type="file" name="avatar" id="avatar" class="form-control form-control-sm mt-1" aria-describedby="avatar-info">

                    <div id="avatar-info" class="form-text">
                        Accepted file types: jpg, jpeg, png, gif.
                        Max file size 1048kb.
                    </div>
                    {{-- error --}}
                    @error('avatar')
                        <div class="text-danger small">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $user->name }}">

                {{-- error --}}
                @error('name')
                    <div class="text-danger small">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- email --}}
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ?? $user->email }}">

                {{-- error --}}
                @error('email')
                    <div class="text-danger small">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- introduction --}}
            <div class="mb-3">
                <label for="introduction" class="form-label fw-bold">Introduction</label>
                <textarea
                    name="introduction"
                    id="introduction"
                    class="form-control"
                    rows="5"
                    class="form-control"
                    placeholder="Describe yourself">{{ old('introduction') ?? $user->introduction }}</textarea>

                {{-- error --}}
                @error('introduction')
                    <div class="text-danger small">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- submit --}}
            <button type="submit" class="btn btn-warning px-5">Save</button>
        </form>
        </div>
        {{-- change password --}}


@endsection
