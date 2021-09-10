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
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                        @if ($profile->picture!=NULL)
                        <img class="profile-user-img img-fluid img-circle"
                        src="{{asset('images/'.$profile->picture)}}"
                        alt="User profile picture">
                        @else
                        <img class="profile-user-img img-fluid img-circle"
                        src="{{asset('images/profiledefault.png')}}"
                        alt="User profile picture">
                        @endif
                  </div>
                  <h3 class="profile-username text-center">{{$profile->name}}</h3>
                  <p class="text-muted text-center">{{$profile->job}}</p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
              <!-- About Me Box -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  
  
                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
  
                  <p class="text-muted">{{$profile->address}}</p>
  
                  <hr>

                  <strong><i class="fas fa-calendar mr-1"></i> Birthday</strong>
  
                  <p class="text-muted"><?php echo date('d F Y', strtotime($profile->birthday)); ?></p>

                  <hr>

                  <strong><i class="fas fa-user-graduate mr-1"></i> Education</strong>
  
                  <p class="text-muted">
                   {{$profile->education}}
                  <?php echo date("Y", strtotime($profile->edu_date_start)); ?> - <?php echo date("Y", strtotime($profile->edu_date_finish)); ?>
                  </p>
                  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Profile</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          @if ($profile->picture!=NULL)
                          <img class="img-circle img-bordered-sm" src="{{asset('images/'.$profile->picture)}}" alt="user image">
                          @else
                              <img class="img-circle img-bordered-sm" src="{{asset('images/profiledefault.png')}}" alt="user image">
                          @endif
                          <span class="username">
                            <a href="#">{{$profile->name}}</a>
                          </span>
                          <span class="description">{{$profile->email}}</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                          {!!$profile->about!!}
                        </p>
                        <p>
                          <iframe src="{{$profile->googlemap}}" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </p>
                      </div>
                      <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->
  
                    <div class="tab-pane" id="settings">
                      <form class="form-horizontal" action="/profile/1" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{$profile->name}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{$profile->email}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputBirthday" class="col-sm-3 col-form-label">Birthday</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" id="inputBirthday" name="birthday" value="{{$profile->birthday}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputAddress" class="col-sm-3 col-form-label">Address</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="inputAddress" placeholder="Address" name="address">{{$profile->address}}</textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputGooglemap" class="col-sm-3 col-form-label">Google Map</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="inputGooglemap" placeholder="Google Map" name="googlemap">{{$profile->googlemap}}</textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPhone" class="col-sm-3 col-form-label">Phone</label>
                          <div class="col-sm-9">
                            <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text">+62</div>
                              </div>
                              <input type="text" class="form-control" id="inlineFormInputGroup" name="phone" value="{{$profile->phone}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputAbout" class="col-sm-3 col-form-label">About</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="summernote" placeholder="About" name="about">{{$profile->about}}</textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEducation" class="col-sm-3 col-form-label">Education</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEducation" placeholder="Education" name="education" value="{{$profile->education}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEdudatestart" class="col-sm-3 col-form-label">Education Start</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" id="inputEdudatestart" name="edu_date_start" value="{{$profile->edu_date_start}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEdudatefinish" class="col-sm-3 col-form-label">Education Finish</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" id="inputEdudatefinish" name="edu_date_finish" value="{{$profile->edu_date_finish}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputJob" class="col-sm-3 col-form-label">Job</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputJob" placeholder="Job" name="job" value="{{$profile->job}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPicture" class="col-sm-3 col-form-label">Picture</label>
                          <div class="col-sm-6">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input @error('picture') is-invalid @enderror" id="picture" name="picture" onchange="previewImg()">
                              <label class="custom-file-label" for="picture">Choose Picture</label>
                            </div>
                            @error('picture')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            @if ($profile->picture!=NULL)
                            <img src="{{ asset('images/'.$profile->picture) }}" alt="" class="img-thumbnail img-preview">
                            @else
                            <img src="{{ asset('images/default-image.jpg') }}" alt="" class="img-thumbnail img-preview">
                            @endif
                          </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <button type="submit" class="btn btn-danger float-left"><i class="fas fa-save"></i> Save</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
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