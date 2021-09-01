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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="float-right">
                  @include('cer.create_modal')
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Picture</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $x=1; ?>
                  @foreach ($cers as $cer)
                  <tr>
                    <td><?php echo $x++.'.'; ?></td>
                    <td>{{$cer->cer_title}}</td>
                    <td>{{$cer->cer_info}}</td>
                    <td>
                        @if ($cer->picture!=NULL)
                        <img src="{{asset('images/'.$cer->picture)}}" alt="{{$cer->cer_title}}" class="img-thumbnail" width="50">
                        @else
                        <img src="{{asset('images/default-image.JPG')}}" alt="{{$cer->cer_title}}" class="img-thumbnail" width="50">
                        @endif
                    </td>
                    <td><?php echo date("d F Y", strtotime($cer->cer_date)); ?></td>
                    <td>
                      @include('cer.edit_modal')
                      @include('cer.delete_modal')
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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
  <script>
    function previewImg() {
        const picture = document.querySelector('#picture');
        const imgPreview = document.querySelector('.img-preview');
        const filePicture = new FileReader();
        filePicture.readAsDataURL(picture.files[0]);

        filePicture.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
@endsection