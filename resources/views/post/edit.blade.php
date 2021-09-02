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
              <li class="breadcrumb-item"><a href="/post">Post</a></li>
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
                <h3 class="card-title">Edit your post to share!</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div> 
              <div class="card-body">
              <form action="/post/{{$post->id}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="post_title">Post Title</label>
                            <input type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title" id="post_title" placeholder="Post Title" value="{{$post->post_title}}">
                            @error('post_title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="post_info">Post Description</label>
                            <textarea name="post_info" id="summernote" class="form-control @error('post_info') is-invalid @enderror" cols="30" rows="10">{{$post->post_info}}</textarea>
                            @error('post_info')
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
                            @if ($post->picture!=NULL)
                            <img src="{{ asset('images/'.$post->picture) }}" alt="" class="img-thumbnail img-preview">
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