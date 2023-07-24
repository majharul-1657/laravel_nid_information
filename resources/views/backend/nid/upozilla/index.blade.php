@extends('backend.layouts.master')
@section('title', 'All-zilla - dashboard')
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
                  <li class="breadcrumb-item active">Upo Zilla class</li>
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
                      <h3>All Upo Zilla
                          <a class="btn btn-primary float-right btn-sm" href="{{ route('backend.upozilla.create') }}">Add Upo Zilla</a>
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SR number</th>
                                <th>Upo Zilla name</th>
                                <th class="text-center">Action</th>
                              </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($allData as $keys => $data)
                            <tr>
                                <td>{{ $keys+1 }}</td>
                                <td>{{ $data->name }} </td>
                                <td class="text-center">
                                    <a class="btn btn-warning btn-sm" href="{{ route('backend.upozilla.edit', $data->id) }}"><i class="fa fa-edit"></i></a>
                                    <a id="" class="btn btn-danger btn-sm delete" href="{{ route('backend.upozilla.delete', $data->id) }}"><i class="fa fa-trash"></i></a>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SR number</th>
                                <th>Zilla name</th>
                                <th>Action</th>
                              </tr>
                        </tfoot>
                      </table>
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