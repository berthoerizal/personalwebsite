<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#editModal{{$skill->id}}">
    <i class="fas fa-edit"></i>
    Edit
</a>
<!-- Tambah Modal-->
<div class="modal fade" id="editModal{{$skill->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Skill | Edit</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <form action="/skill/{{$skill->id}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="skill_title">Skill Name</label>
                            <input type="text" class="form-control" name="skill_title" id="skill_title" placeholder="Skill Name" value="{{$skill->skill_title}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Picture</label><br>
                            <input type="file" name="picture" id="picture" onchange="previewImg()">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="name">Preview Image</label><br>
                        @if ($skill->picture!=NULL)
                        <img src="{{ asset('images/'.$skill->picture) }}" class="img img-responsive img-preview border" width="200px">
                        @else
                        <img src="{{ asset('images/default-image.JPG') }}" class="img img-responsive img-preview border" width="200px">
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    </div>
</div>
