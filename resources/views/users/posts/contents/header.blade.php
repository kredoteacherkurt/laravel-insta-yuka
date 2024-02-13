<div class="card-header bv-white py-3">
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
            <a href="#" class="text-decoration-none text-dark">{{$post->user->name}}</a>
        </div>
        <div class="col-auto">
            <div class="dropdown">
                <button class="btn btn-sm shadow-none" data-bs-toggle="dropdown">
                    <i class="fa-solid fa-ellipsis"></i>
                </button>

                <div class="dropdown-menu">
                    {{-- if youre the user --}}
                    @if ($post->user->id == Auth::id())
                        <a href="{{route('post.edit',$post)}}" class="dropdown-item">
                            <i class="fa-solid fa-pen-to-square"></i>Edit
                        </a>
                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-{{$post->id}}">
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
