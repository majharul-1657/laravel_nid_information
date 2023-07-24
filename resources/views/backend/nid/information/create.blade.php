@extends('backend.layouts.master')
@section('title', 'Add-NID information - dashboard')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">NID managment</h1>
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
                  <h3>NID information
                    <a class="btn btn-primary float-right btn-sm" href="{{ route('backend.information.index') }}"><i class="fa fa-list"></i> All NID information</a>
                  </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" class="myForm" action="{{ route('backend.information.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="name">Name:</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                          @error('name')
                             <font style="color: red">{{ $message }}</font>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                          <label for="bangla_name">নাম (বাংলায়):</label>
                          <input type="text" class="form-control" id="bangla_name" name="bangla_name" placeholder="Enter name">
                          @error('bangla_name')
                             <font style="color: red">{{ $message }}</font>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                          <label for="father_name">Father name:</label>
                          <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Enter father name">
                          @error('father_name')
                             <font style="color: red">{{ $message }}</font>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                          <label for="mother_name">Mather name:</label>
                          <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Enter mother name">
                          @error('mother_name')
                             <font style="color: red">{{ $message }}</font>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                          <label for="date_of_birth">Date of birth:</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask placeholder="Enter date of birth">
                            @error('date_of_birth')
                             <font style="color: red">{{ $message }}</font>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="mobile">Mobile:</label>
                          <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile number">
                          @error('mobile')
                             <font style="color: red">{{ $message }}</font>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                          <label for="email">Email:</label>
                          <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                          @error('email')
                             <font style="color: red">{{ $message }}</font>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                          <label for="nid_number">NID number:</label>
                          <input type="text" class="form-control" id="nid_number" name="nid_number" placeholder="Enter nid number">
                          @error('nid_number')
                             <font style="color: red">{{ $message }}</font>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                          <label for="gender">Gender:</label>
                          <select name="gender" id="gender" class="form-control">
                            <option value="">Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                          @error('gender')
                             <font style="color: red">{{ $message }}</font>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                          <label for="blood_name">Blood group:</label>
                          <select name="blood_name" id="blood_name" class="form-control select2bs4">
                            <option value="">Select blood group</option>
                            @foreach ($allBlood as $blood)
                            <option value="{{ $blood->name }}">{{ $blood->name }}</option>
                            @endforeach
                          </select>
                          @error('blood_name')
                             <font style="color: red">{{ $message }}</font>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                          <label for="zilla_name">Zilla:</label>
                          <select name="zilla_name" id="zilla_name" class="form-control select2bs4">
                            <option value="">Select zilla</option>
                            @foreach ($allZilla as $zilla)
                            <option value="{{ $zilla->name }}">{{ $zilla->name }}</option>
                            @endforeach
                          </select>
                          @error('zilla_name')
                             <font style="color: red">{{ $message }}</font>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                          <label for="upozilla_name">Upo Zilla:</label>
                          <select name="upozilla_name" id="upozilla_name" class="form-control select2bs4">
                            <option value="">Select upo zilla</option>
                            @foreach ($allUpoZilla as $upoZilla)
                            <option value="{{ $upoZilla->name }}">{{ $upoZilla->name }}</option>
                            @endforeach
                          </select>
                          @error('upozilla_name')
                             <font style="color: red">{{ $message }}</font>
                          @enderror
                        </div>
                        <div class="form-group col-md-3">
                          <label for="address_name">Address: Village/Road</label>
                          <select name="address_name" id="address_name" class="form-control select2bs4">
                            <option value="">Select address</option>
                            @foreach ($allAddress as $address)
                            <option value="{{ $address->name }}">{{ $address->name }}</option>
                            @endforeach
                          </select>
                          @error('address_name')
                             <font style="color: red">{{ $message }}</font>
                          @enderror
                        </div>

                        <div class="form-group col-md-3">
                          <label for="photo">photo:</label>
                          <input type="file" class="form-control" id="photo" name="photo">
                          @error('photo')
                             <font style="color: red">{{ $message }}</font>
                          @enderror
                        </div>


                        <div class="form-group col-md-3">
                            <label for="Create_name">Create:</label>
                            <input type="text" class="form-control" id="Create_name" name="Create_name" placeholder="create">
                            @error('Create_name')
                               <font style="color: red">{{ $message }}</font>
                            @enderror
                          </div>

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
@section('backend_js')
<!-- InputMask -->
<script src="{{asset('backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('backend/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<script type="text/javascript">
  //Initialize Select2 Elements
  $('.select2').select2();
   //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
$(document).ready(function () {
  $('.myForm').validate({
    rules: {
      "fee_category_id": {
        required: true
      },
      "class_id[]": {
        required: true
      },
      "amount[]": {
        required: true
      }
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
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

</script>
@endsection
