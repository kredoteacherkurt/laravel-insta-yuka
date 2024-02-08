@extends('layouts.app')

@section('title', 'Create post')

@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        {{-- categoreies --}}

        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea name="description" id="description" rows="3" class="form-control" placeholder="Description"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <p class="form-text">
                Accepted Formats: JPEG, PNG, JPG, GIF <br>
                Maximum File Size: 148mb
            </p>
            <button type="submit" class="btn btn-primary px-5">Post</button>
        </div>

    </form>
@endsection
