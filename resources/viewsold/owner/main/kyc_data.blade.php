@extends('components.owner.main')
@section('main-container')



@if($data->is_verify==0)
<div class="container pt-4 pb-4">
  <div class="row justify-content-center">
    <div class="col-lg-9">
      <div class="kyc-form">
        <h6>Your account is not activated. Provide some basic details for verification purpose. After providing KYC details your account will be activated.</h6>
        <form id="kycForm" class="row pt-4" action=""  enctype="multipart/form-data">


          <div class="col-lg-6 mb-5">
            <label for="fullName">Full Name<small>(as per documents)</small></label>
            {{-- <input type="text" class="form-control" id="fullName" value="" required pattern="[A-Za-z]+" title="Only alphabetic characters are allowed"> --}}
            <h4>{{ $data->fname }}</h4>
        </div>

          <div class="col-lg-6 mb-5">
            <label for="address">Address<small>(as per documents)</small></label>
            {{-- <input type="text" class="form-control" id="address" value="" required> --}}
            <h4>{{ $data->address }}</h4>
          </div>
        <div class="col-lg-6 mb-5">
            <label for="sharedField">ID NUMBER<small>(as per documents)</small></label>
            {{-- <input type="text" class="form-control" id="sharedField" value="" required> --}}
            <h4>{{ $data->unique_id }}</h4>
        </div>
        <div class="col-lg-6 mb-5">
            <label for="sharedFieldConfirm">Confirm ID NUMBER<small>(as per documents)</small></label>
            {{-- <input type="text" class="form-control" id="sharedFieldConfirm" value="" required data-parsley-equalto="#sharedField"> --}}
            <h4>{{ $data->unique_id }}</h4>
        </div>
          <div class="col-lg-6 mb-5">
            <label for="country">Country</label>
            {{-- <input type="text" value=""> --}}
            <h4>{{ $country->country_name }}</h4>

          </div>
          <div class="col-lg-6 mb-5">
            <label for="state">State</label>
            {{-- <input type="text" value=""> --}}
            <h4>{{ $data->state }}</h4>
          </div>
          <div class="col-lg-6 mb-5">
            <label for="city">City</label>
            {{-- <input type="text" id="city" value="" class="form-control" required> --}}
            <h4>{{ $data->city }}</h4>
          </div>
          <div class="col-lg-6 mb-5">
            <label for="zipCode">Zip Code</label>
            {{-- <input type="text" id="zipCode" value="" class="form-control" required> --}}
            <h4>{{ $data->zip_code }}</h4>
          </div>

          <h5>Documents</h5>
          <div class="col-lg-6 mb-5">
            <h5>ID Image Front</h5>
            <a href="{{ asset('images_uploade/'.$data->adhar_front) }}" download>
                <i class="bi bi-download"></i>
            <img src="{{ asset('images_uploade/'.$data->adhar_front) }}" height="150px" width="150px" alt="">
        </a>
        </div>
        <div class="col-lg-6 mb-5">
            <h5>ID Image Back</h5>

        <a href="{{ asset('images_uploade/'.$data->adhar_back) }}" download>
            <i class="bi bi-download"></i>
        <img src="{{ asset('images_uploade/'.$data->adhar_back) }}" height="150px" width="150px" alt="">
    </a>
        </div>
        <div class="mb-4">
            <h5>Status</h5>
            <h4>
                @if($data->is_verify == 0)
               <h4>Pending</h4>
                @elseif($data->is_verify == 1)
                <h4>Approved</h4>
                @endif
            </h4>
        </div>


        </form>
        <div class="kyc-buttons pt-3">
            <a href="#">
            <button class="kyc-back-btn">KYC EDIT REQUEST</button>
        </a>
          </div>
      </div>
    </div>
  </div>
</div>
@else
<div class="container pt-4 pb-4">
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="kyc-form">
          <h6>Your account is activeted successfully</h6>
          <form id="kycForm" class="row pt-4" action=""  enctype="multipart/form-data">


            <div class="col-lg-6 mb-5">
              <label for="fullName">Full Name<small>(as per documents)</small></label>
              {{-- <input type="text" class="form-control" id="fullName" value="" required pattern="[A-Za-z]+" title="Only alphabetic characters are allowed"> --}}
              <h4>{{ $data->fname }}</h4>
          </div>

            <div class="col-lg-6 mb-5">
              <label for="address">Address<small>(as per documents)</small></label>
              {{-- <input type="text" class="form-control" id="address" value="" required> --}}
              <h4>{{ $data->address }}</h4>
            </div>
          <div class="col-lg-6 mb-5">
              <label for="sharedField">ID NUMBER<small>(as per documents)</small></label>
              {{-- <input type="text" class="form-control" id="sharedField" value="" required> --}}
              <h4>{{ $data->unique_id }}</h4>
          </div>
          <div class="col-lg-6 mb-5">
              <label for="sharedFieldConfirm">Confirm ID NUMBER<small>(as per documents)</small></label>
              {{-- <input type="text" class="form-control" id="sharedFieldConfirm" value="" required data-parsley-equalto="#sharedField"> --}}
              <h4>{{ $data->unique_id }}</h4>
          </div>
            <div class="col-lg-6 mb-5">
              <label for="country">Country</label>
              {{-- <input type="text" value=""> --}}
              <h4>{{ $country->country_name }}</h4>

            </div>
            <div class="col-lg-6 mb-5">
              <label for="state">State</label>
              {{-- <input type="text" value=""> --}}
              <h4>{{ $data->state }}</h4>

            </div>
            <div class="col-lg-6 mb-5">
              <label for="city">City</label>
              {{-- <input type="text" id="city" value="" class="form-control" required> --}}
              <h4>{{ $data->city }}</h4>
            </div>
            <div class="col-lg-6 mb-5">
              <label for="zipCode">Zip Code</label>
              {{-- <input type="text" id="zipCode" value="" class="form-control" required> --}}
              <h4>{{ $data->zip_code }}</h4>
            </div>

            <h5>Documents</h5>
            <div class="col-lg-6 mb-5">
              <h5>ID Image Front</h5>
              <a href="{{ asset('images_uploade/'.$data->adhar_front) }}" download>
                  {{-- <i class="bi bi-download"></i> --}}
              <img src="{{ asset('images_uploade/'.$data->adhar_front) }}" height="150px" width="150px" alt="">
          </a>
          </div>
          <div class="col-lg-6 mb-5">
              <h5>ID Image Back</h5>

          <a href="{{ asset('images_uploade/'.$data->adhar_back) }}" download>
              {{-- <i class="bi bi-download"></i> --}}
          <img src="{{ asset('images_uploade/'.$data->adhar_back) }}" height="150px" width="150px" alt="">
      </a>
          </div>
          <div class="mb-4">
              <h5>Status</h5>
              <h4>
                  @if($data->is_verify == 0)
                 <h4>Pending</h4>
                  @elseif($data->is_verify == 1)
                  <h4>Approved</h4>
                  @endif
              </h4>
          </div>


          </form>
          <div class="kyc-buttons pt-3">
              <a href="#">
              <button class="kyc-back-btn">KYC EDIT REQUEST</button>
          </a>
            </div>
        </div>
      </div>
    </div>
  </div>
  @endif

@endsection

