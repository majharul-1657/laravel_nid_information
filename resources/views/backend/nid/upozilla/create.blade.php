@extends('backend.layouts.master')
@section('title', 'Add-student-class - dashboard')
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Upo Zilla managment</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                  <li class="breadcrumb-item active">Upo Zilla</li>
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
                  <h3>Add Upo Zilla 
                    <a class="btn btn-primary float-right btn-sm" href="{{ route('backend.upozilla.index') }}"><i class="fa fa-list"></i> All Upo Zilla</a>
                  </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('backend.upozilla.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                        <div class="form-group">
                            <label for="name">Upo Zilla name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter upo zilla name">
                            @error('name')
                                <font style="color: red">{{ $message }}</font>
                            @enderror
                          </div>
                          <div class="form-group">
                              <input type="submit" class="btn btn-primary" value="Submit">
                          </div>
                  </div>
                </form>
              </div>
        </div>
    </div>
</div>
</section>
@endsection