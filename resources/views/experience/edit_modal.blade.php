<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#editModal{{$exp->id}}">
    <i class="fas fa-edit"></i>
    Edit
</a>
<!-- Tambah Modal-->
<div class="modal fade" id="editModal{{$exp->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Experience | Edit</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <form action="/experience/{{$exp->id}}" method="POST">
            @method('PUT')
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exp_title">Experience Title</label>
                            <input type="text" class="form-control" name="exp_title" id="exp_title" placeholder="Experience Title" value="{{$exp->exp_title}}">
                        </div>
                        <div class="form-group">
                            <label for="exp_place">Experience Place</label>
                            <input type="text" class="form-control" name="exp_title" id="exp_place" placeholder="Experience Place" value="{{$exp->exp_place}}">
                        </div>
                        <div class="form-group">
                            <label for="exp_info">Experience Description</label>
                            <input type="text" class="form-control" name="exp_info" id="exp_info" placeholder="Experience Description" value="{{$exp->exp_info}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exp_date_start">Date Start</label>
                            <input type="date" class="form-control" name="exp_date_start" id="exp_date_start" value="{{$exp->exp_date_start}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exp_date_finish">Date Finish</label>
                            <input type="date" class="form-control" name="exp_date_finish" id="exp_date_finish" value="{{$exp->exp_date_finish}}">
                        </div>
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
