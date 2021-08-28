<a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#createModal">
    <i class="fa fa-plus"></i>
    Add
</a>
<!-- Tambah Modal-->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Skill</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <form action="/skill" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Skill Name</label>
                    <input type="text" class="form-control" name="skill_title" id="skill_title" placeholder="Skill Name" value="{{old('skill_title')}}">
                </div>
                <div class="form-group">
                    <label for="name">Picture</label>
                    <div class="custom-file">
                        <input type="file" name="picture" class="custom-file-input" id="inputGroupFile02">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </form>
    </div>
    </div>
</div>
