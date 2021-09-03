@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        @include('message.alert_notif')
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$post_count}}</h3>

                <p>Post</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/post" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$port_count}}</h3>

                <p>Portfolio</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/portfolio" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$cer_count}}</h3>

                <p>Certificate</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/certificate" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$exp_count}}</h3>

                <p>Experience</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/experience" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="nav-icon fas fa-feather"></i> Add your post to share!</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div> 
              <div class="card-body">
                <form action="/post" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="post_title">Post Title</label>
                              <input type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title" id="post_title" placeholder="Post Title" value="{{old('post_title')}}">
                              @error('post_title')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="post_info">Post Description</label>
                              <textarea name="post_info" id="summernote" class="form-control @error('post_info') is-invalid @enderror" cols="30" rows="10">{{old('post_info')}}</textarea>
                              @error('post_info')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group row">
                              <div class="col-md-12">
                                  <label for="picture">Picture</label>
                              </div>
                              <div class="col-sm-4">
                                <img src="{{ asset('images/default-image.jpg') }}" alt="Preview-image" class="img-thumbnail img-preview">
                              </div>
                              <div class="col-sm-8">
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
          <div class="col-md-6">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <a href="/post" class="btn btn-primary">All Posts <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              @foreach ($posts as $post)
              <div>
                <i class="fas fa-cookie bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> {{$post->created_at->diffForHumans()}}</span>
                  <h3 class="timeline-header"><a href="#">{{$post->post_title}}</a> By {{$configweb->developer}}</h3>

                  <div class="timeline-body">
                    {!!  substr(strip_tags($post->post_info), 0, 100) !!}...
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-sm" href="/post/{{$post->post_slug}}">Read more</a>
                  </div>
                </div>
              </div>
              @endforeach
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection