@extends('backend.layouts.master')
@section('title', 'Add-subject - dashboard')
@section('content')
  <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">User managment</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                  <li class="breadcrumb-item active">User</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                  <h3>Users
                    <a class="btn btn-primary float-right btn-sm" href="{{ route('backend.user.index') }}"><i class="fa fa-list"></i> All user</a>
                  </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="myForm" action="{{ route('backend.user.update', $allData->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="usertype">User type:</label>
                              <select class="form-control" name="usertype" id="usertype">
                                <option value="">Select option</option>
                                <option value="Admin" {{ ($allData->usertype=="Admin")?'selected':''  }}>Admin</option>
                                <option value="User" {{ ($allData->usertype=="User")?'selected':''  }}>User</option>
                              </select>
                              @error('usertype')
                                  <font style="color: red">{{ $message }}</font>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="name">User name:</label>
                              <input type="text" class="form-control" id="name" name="name" value="{{ $allData->name }}" placeholder="Enter user name">
                              @error('name')
                                  <font style="color: red">{{ $message }}</font>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="email">Email:</label>
                              <input type="email" class="form-control" id="email" name="email" value="{{ $allData->email }}" placeholder="Enter your email">
                              @error('email')
                                  <font style="color: red">{{ $message }}</font>
                              @enderror
                            </div>
                          </div>
                        </div>
                          <div class="form-group">
                              <input type="submit" class="btn btn-primary" value="Update">
                          </div>
                  </div>
                </form>
              </div>
        </div>
    </div>
</div>
</section>
@endsection
@section('backend_js')
<!-- sweetalert2 -->

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
$(document).ready(function () {
  $('#myForm').validate({
    rules: {
      usertype: {
        required: true
      },
      name: {
        required: true
      },
      email: {
        required: true
      },
      password: {
        required: true
      },
      cPassword: {
        required: true,
        equalTo:'#password'
      }
    },
    message:{

    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
  </script>
@endsection