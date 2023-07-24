@extends('backend.layouts.master')
@section('title', 'All-address - dashboard')
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">NID information managment</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                  <li class="breadcrumb-item active">NID information</li>
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
                      <h3>Nid information
                          <a class="btn btn-primary float-right btn-sm" href="{{ route('backend.information.create') }}">Add NID</a>
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SR number</th>
                                <th>Name</th>
                                <th>Father name</th>
                                <th>Mather name</th>
                                <th>Zilla</th>
                                <th>Date of birth</th>
                                <th>create</th>
                                <th class="text-center">Action</th>
                              </tr>
                        </thead>
                        <tbody>
                            @foreach ($allData as $keys => $data)
                              <tr>
                                <td>{{ $keys+1 }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->father_name }}</td>
                                <td>{{ $data->mother_name }}</td>
                                <td>{{ $data->zilla_name}}</td>
                                <td>{{ $data->date_of_birth }}</td>
                                {{-- //creaye --}}
                                <td>{{ $data->Create_name }}</td>
                                <td class="text-center">
                                  <a class="btn btn-primary btn-sm" href="{{ route('backend.information.show', $data->id) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('backend.information.edit', $data->id) }}"><i class="fa fa-edit"></i></a>
                                    <a id="" class="btn btn-danger btn-sm delete" href="{{ route('backend.information.delete', $data->id) }}"><i class="fa fa-trash"></i></a>
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
