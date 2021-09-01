<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#editModal{{$cer->id}}">
    <i class="fas fa-edit"></i>
    Edit
</a>
<!-- Tambah Modal-->
<div class="modal fade" id="editModal{{$cer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Certificate | Edit</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <form action="/certificate/{{$cer->id}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cer_title">Certificate Title</label>
                            <input type="text" class="form-control" name="cer_title" id="cer_title" placeholder="Certificate Title" value="{{$cer->cer_title}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cer_info">Certificate Description</label>
                            <input type="text" class="form-control" name="cer_info" id="cer_info" placeholder="Certificate Description" value="{{$cer->cer_info}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cer_date">Certificate Date</label>
                            <input type="date" class="form-control" name="cer_date" id="cer_date" value="{{$cer->cer_date}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Picture</label><br>
                            <input type="file" name="picture" id="picture" onchange="previewImg()">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="name">Preview Image</label><br>
                        @if ($cer->picture!=NULL)
                        <img src="{{ asset('images/'.$cer->picture) }}" class="img img-responsive img-preview border" width="200px">
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
