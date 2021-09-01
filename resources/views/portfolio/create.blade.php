@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/portfolio">Portfolio</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add your portfolio to show up!</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div> 
              <div class="card-body">
              <form action="/portfolio" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="port_title">Portfolio Title</label>
                            <input type="text" class="form-control @error('port_title') is-invalid @enderror" name="port_title" id="port_title" placeholder="Portfolio Title" value="{{old('port_title')}}">
                            @error('port_title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="port_info">Portfolio Description</label>
                            <textarea name="port_info" id="summernote" class="form-control @error('port_info') is-invalid @enderror" cols="30" rows="10">{{old('port_info')}}</textarea>
                            @error('port_info')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="picture">Picture</label>
                            </div>
                            <div class="col-sm-2">
                            <img src="{{ asset('images/default-image.jpg') }}" alt="" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('picture') is-invalid @enderror" id="picture" name="picture" onchange="previewImg()">
                                    <label class="custom-file-label" for="picture">Choose Picture</label>
                                </div>
                            </div>
                            @error('picture')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="port_date">Date</label>
                            <input type="date" class="form-control @error('port_date') is-invalid @enderror" name="port_date" id="port_date" value="{{old('port_date')}}">
                            @error('port_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                      <div class="float-right">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                </div>  
              </form>
            </div>
          </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- End of Main Content -->
  <script>
    function previewImg() {
        const picture = document.querySelector('#picture');
        const pictureLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        pictureLabel.textContent = picture.files[0].name;

        const filePicture = new FileReader();
        filePicture.readAsDataURL(picture.files[0]);

        filePicture.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
  </script>
@endsection