@extends('backend.layouts.master')
@section('title', 'All-subject - dashboard')
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">User profile managment</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                  <li class="breadcrumb-item active">User profile</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4 offset-md-4 mt-3">
                  <!-- Profile Image -->
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ !empty($allData->photo)? asset('storage/upload/user_photo/'.$allData->photo):asset('storage/upload/user_photo/no-image.png')}}"
                            alt="User profile picture">
                      </div>

                      <h3 class="profile-username text-center">{{ $allData->name }}</h3>

                      <p class="text-muted text-center">{{ $allData->address }}</p>

                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>Mobile No</b> <a class="float-right">{{ $allData->mobile }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Email</b> <a class="float-right">{{ $allData->email }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Gender</b> <a class="float-right">{{ $allData->gender }}</a>
                        </li>
                      </ul>

                      <a href="{{ route('backend.profile.edit', $allData->id) }}" class="btn btn-primary btn-block"><b>Edit profile</b></a>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
            </div>
        </div>
      </section>
@endsection
@section('backend_css')
<!-- sweetalert2 -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11.4.6/dist/sweetalert2.min.css">
@endsection
@section('backend_js')
<!-- sweetalert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11.4.6/dist/sweetalert2.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
    //alert
    $(function(){
      $(document).on('click', '.delete', function(e){
        e.preventDefault(); 
        let url = $(this).attr("href");
        Swal.fire({
        title: 'Are you sure?',
        text: "Delete this data!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href= url;
        }
        })
      })
    });
  </script>
@endsection