@extends('frontend.layouts.master')
@section('title', 'Relief managmant system')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-3">
          <div class="card mt-3">
              <div class="card-header text-center">
                <div class="row">
                    <div class="col-md-1">
                       <img src="{{ asset('frontend/images/logo.png') }}" height="85px" width="85px" alt="">
                    </div>
                    <div class="col-md-11">
                        <h5>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</h5>
                        <h6>Government of the people's republic of bangladesh</h6>
                        <h6><span class="text-danger">National Id Card</span>/ জাতীয় পরিচয় পত্র</h6>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" class="myForm" action="{{ route('nid.search') }}" method="GET" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-12">
                          <label for="nid_number">NID number:</label>
                          <input type="text" class="form-control" id="nid_number" name="nid_number" placeholder="Enter nid number">
                          @error('nid_number')
                             <font style="color: red">{{ $message }}</font>
                          @enderror
                        </div>
                      <div class="form-group col-md-12">
                        <label for="date_of_birth">Date of birth:</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                          </div>
                          <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask placeholder="Enter date of birth">
                        </div>
                        @error('date_of_birth')
                           <font style="color: red">{{ $message }}</font>
                          @enderror
                      </div>
                      <div class="form-group col-md-12">
                          <label for="zilla_name">Zilla name:</label>
                          <select name="zilla_name" id="zilla_name" class="form-control select2bs4">
                            <option value="">Select Zilla</option>
                            @foreach ($allZilla as $zilla)
                            <option value="{{ $zilla->name }}">{{ $zilla->name }}</option>
                            @endforeach
                          </select>
                          @error('zilla_name')
                             <font style="color: red">{{ $message }}</font>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary form-control" value="Search">
                   </div>
                   @if (isset($nid_information))
                     <a class="btn btn-primary mt-3" href="{{ route('frontend.home') }}">Refresh</a>
                  @elseif(isset($count))
                     <a class="btn btn-primary mt-3" href="{{ route('frontend.home') }}">Refresh</a>
                  @endif
                </div>
              </form>

            </div>
            @if (isset($nid_information))
            <div class="card mt-3">
              <div class="card-header text-center">
                <div class="row">
                    <div class="col-md-1">
                       <img src="{{ asset('frontend/images/logo.png') }}" height="80px" width="80px" alt="">
                    </div>
                    <div class="col-md-11">
                        <h5>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</h5>
                        <h6>Government of the people's republic of bangladesh</h6>
                        <h6><span class="text-danger">National Id Card</span>/ জাতীয় পরিচয় পত্র</h6>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">
                    @foreach ($nid_information as $information)
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="{{asset('storage/upload/nidinfo/'.$information->photo)}}" height="120px" width="120" style="border-radius: 3px" alt="">
                            <h6 class="mt-2">{{ $information->signature }}</h6>
                        </div>
                        <div class="col-md-8">
                            <h5 style="font-size: 18px"><strong>Name:  </strong><strong class="ml-4">{{ $information->name }}</strong></h5>
                            <h5 style="font-size: 18px"><strong>নাম:</strong><span class="ml-4"> {{ $information->bangla_name }}</span></h5>
                            <h5 style="font-size: 18px"><strong>Father:</strong> <span class="ml-4">{{ $information->father_name }}</span></h5>
                            <h5 style="font-size: 18px"><strong>Mother:</strong> <span class="ml-4">{{ $information->mother_name }}</span></h5>
                            <h5 style="font-size: 18px"><strong>Date of Bitth:</strong> <span class="ml-4">{{ $information->date_of_birth }}</span></h5>
                            <h5 style="font-size: 18px"><strong>ID NO:</strong> <span class="ml-4">{{ $information->nid_number }}</span></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
              </form>
            </div>
            <div class="card mt-3">
                <div class="card-header text-center">
                  <div class="row">
                      <div class="col-md-12">
                        <h6 style="font-size: 14px">এই কার্ডটি বাংলাদেশ সরকারের সম্পত্তি । কার্ডটি ব্যবহারকারী ব্যতীত অন্য কোথাও পাওয়া গেলে নিকটস্থ পোস্ট অফিসে জমা দেওয়ার জন্য অনুরধ করা হল।</h6>
                      </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @foreach ($nid_information as $information)
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                            <h6><strong>Address (Village/Road):</strong> <span class="ml-1">{{ $information->address_name }},</span> <span class="ml-1">{{ $information->upozilla_name }},</span> <span class="ml-1">{{ $information->zilla_name }}</span></h6>
                            <h6 class="mt-2"><strong>Blood group:</strong> <span class="ml-1">{{ $information->blood_name }}</span></h6>
                          </div>
                      </div>
                  </div>

                  @endforeach
              </div>
            @elseif (isset($count))
            <div class="no-result mb-4 mt-2">
                <img src="{{ asset('frontend/images/not-found.jpg') }}" alt="" height="400" width="100%">
            </div>
            @endif
      </div>
    </div>
    <marquee style="color: green">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার রিলিফ ম্যানেজমেন্ট সিস্টেম</marquee>

@endsection
