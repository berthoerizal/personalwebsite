<a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal{{$post->id}}">
    <i class="fa fa-trash-alt"></i>
    Delete
</a>
<!-- Tambah Modal-->
<div class="modal fade" id="deleteModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content bg-danger">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Post | Delete</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <p>Are you sure to delete this <b>{{$post->post_title}}</b> ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <input class="btn btn-outline-light" type="submit" value="Delete" />
            </form> 
            {{-- <a href="{{route('user.destroy', $user->id)}}" class="btn btn-danger">Hapus</a> --}}
        </div>
    </div>
    </div>
</div>