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
              <li class="breadcrumb-item"><a href="/post">Post</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{$post->post_title}}</h3>
                <div class="col-12">
                  <img src="{{asset('images/'.$post->picture)}}" class="product-image" alt="{{$post->post_title}}">
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <h3 class="my-3">{{$post->post_title}}</h3>
                <p>{!!$post->post_info!!}</p>
                <hr>
                <h4 class="mt-3"><small><?php echo date('d F Y', strtotime($post->created_at)); ?></small></h4>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
              <div class="float-right">
                  <a href="/post/{{$post->post_slug}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
              </div>
          </div>
        </div>
        <!-- /.card -->
  
      </section>
    <!-- /.content -->
  </div>
@endsection