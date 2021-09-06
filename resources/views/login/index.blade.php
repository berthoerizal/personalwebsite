
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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/dashboard"><b>Admin</b> {{optional($configweb)->site_name}}</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
        @include('message.alert_notif')

        @if (session()->has('LoginError'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('LoginError') }}
        </div>
        @endif
        <form action="/login" method="post">
            @csrf
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="name@example.com" name="email" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mb-0">
            <a href="/register" class="text-center">Register a new membership</a>
        </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('template_admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template_admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template_admin/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
