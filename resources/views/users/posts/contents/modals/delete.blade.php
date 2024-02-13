
<div class="modal fade" id="delete-post-{{$post->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h5 class="modal-title text-danger" id="modalTitleId">
                    <i class="fa-solid fa-circle-exclamation"></i>Delete Post
                </h5>

            </div>
            <div class="modal-body">
               <p>Are you sure to delete this post?</p>
               <div class="mt-3">
                <img src="{{$post->image}}" alt="" class="img-thumbnail">
               </div>
            </div>
            <div class="modal-footer">
                <form action="{{route('post.destroy',$post)}}" method="post">
                    @csrf
                    @method('DELETE')


                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

