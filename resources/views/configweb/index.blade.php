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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <h3 class="card-title">This is configuration webiste page.</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div> 
              <div class="card-body">
              <form action="/configweb/1" method="POST" enctype="multipart/form-data">
                @method('PUT')
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="profile">Profile</label>
                            <input type="text" class="form-control @error('profile') is-invalid @enderror" name="profile" id="profile" placeholder="Profile" value="{{optional($configweb)->profile}}">
                            @error('profile')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Title" value="{{optional($configweb)->title}}">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" id="type" placeholder="Type" value="{{optional($configweb)->type}}">
                            @error('type')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" placeholder="Description" value="{{optional($configweb)->desc}}">
                            @error('desc')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="url" placeholder="URL" value="{{optional($configweb)->url}}">
                            @error('url')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_name">Site Name</label>
                            <input type="text" class="form-control @error('site_name') is-invalid @enderror" name="site_name" id="site_name" placeholder="Site Name" value="{{optional($configweb)->site_name}}">
                            @error('site_name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="metadata">Metadata</label>
                            <input type="text" class="form-control @error('metadata') is-invalid @enderror" name="metadata" id="metadata" placeholder="Metadata" value="{{optional($configweb)->metadata}}">
                            @error('metadata')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="keywords">Keywords</label>
                            <input type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" id="keywords" placeholder="Keywords" value="{{optional($configweb)->keywords}}">
                            @error('keywords')
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
                            @if (optional($configweb)->picture!=NULL)
                            <img src="{{ asset('images/'.optional($configweb)->picture) }}" alt="" class="img-thumbnail img-preview">
                            @else
                            <img src="{{ asset('images/default-image.jpg') }}" alt="" class="img-thumbnail img-preview">
                            @endif
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
                            <label for="developer">Developer</label>
                            <input type="text" class="form-control @error('developer') is-invalid @enderror" name="developer" id="developer" placeholder="Developer" value="{{optional($configweb)->developer}}">
                            @error('developer')
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