
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{optional($configweb)->site_name}} | {{$title}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template_admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template_admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template_admin/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/dashboard"><b>Admin</b> {{optional($configweb)->site_name}}</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
        <form action="/register" method="post">
            @csrf
            <div class="input-group mb-3">
            <input type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="Full name" name="name" value="{{old('name')}}" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-user"></span>
                </div>
            </div>
            <div class="col-12">
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{old('email')}}">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            <div class="col-12">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            <div class="col-12">
                @error('password')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Retype password" name="password_confirmation">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            <div class="col-12">
                @error('password_confirmation')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            </div>
            <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="float-right">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
            </div>
            <!-- /.col -->
            </div>
        </form>

        <a href="/login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('template_admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template_admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template_admin/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
