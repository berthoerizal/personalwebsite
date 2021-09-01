<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#createModal">
    <i class="fa fa-plus"></i>
    Add
</a>
<!-- Tambah Modal-->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Experience | Add</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <form action="/experience" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exp_title">Experience Title</label>
                            <input type="text" class="form-control" name="exp_title" id="exp_title" placeholder="Experience Title" value="{{old('exp_title')}}">
                        </div>
                        <div class="form-group">
                            <label for="exp_info">Experience Description</label>
                            <input type="text" class="form-control" name="exp_info" id="exp_info" placeholder="Experience Description" value="{{old('exp_info')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exp_date_start">Date Start</label>
                            <input type="date" class="form-control" name="exp_date_start" id="exp_date_start" value="{{old('exp_date_start')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exp_date_finish">Date Finish</label>
                            <input type="date" class="form-control" name="exp_date_finish" id="exp_date_finish" value="{{old('exp_date_finish')}}">
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
