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
                      <h3>Address
                          <a class="btn btn-primary float-right btn-sm" href="{{ route('backend.information.index') }}">All NID</a>
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="" class="table table-bordered table-striped">
                        <tbody>
                              <tr>
                                <th>Name:</th>
                                <td>{{ $allData->name }}</td>
                              </tr>
                              <tr>
                                <th>নাম (বাংলায়):</th>
                                <td>{{ $allData->bangla_name }}</td>
                              </tr>
                              <tr>
                                <th>Father name:</th>
                                <td>{{ $allData->father_name }}</td>
                              </tr>
                              <tr>
                                <th>Mother name:</th>
                                <td>{{ $allData->mother_name }}</td>
                              </tr>
                              <tr>
                                <th>Date of birth:</th>
                                <td>{{ $allData->date_of_birth }}</td>
                              </tr>
                              <tr>
                                <th>Mobile:</th>
                                <td>{{ $allData->mobile }}</td>
                              </tr>
                              <tr>
                                <th>Email:</th>
                                <td>{{ $allData->email }}</td>
                              </tr>
                              <tr>
                                <th>NID number:</th>
                                <td>{{ $allData->nid_number }}</td>
                              </tr>
                              <tr>
                                <th>Gender:</th>
                                <td>{{ $allData->gender }}</td>
                              </tr>
                              <tr>
                                <th>Blood group:</th>
                                <td>{{ $allData->blood_name}}</td>
                              </tr>
                              <tr>
                                <th>Zilla:</th>
                                <td>{{ $allData->zilla_name}}</td>
                              </tr>
                              <tr>
                                <th>Upo Zilla:</th>
                                <td>{{ $allData->upozilla_name}}</td>
                              </tr>
                              <tr>
                                <th>Address:village/Road</th>
                                <td>{{ $allData->address_name}}</td>
                              </tr>
                              <tr>
                                <th>Photo</th>
                                <td><img src="{{ asset('storage/upload/nidinfo/'.$allData->photo) }}" alt="{{ $allData->photo}}" height="100px" width="100px"></td>
                              </tr>

                              <tr>
                                <th>create:</th>
                                <td>{{ $allData->Create_name}}</td>
                              </tr>

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
