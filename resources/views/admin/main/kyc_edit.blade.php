@extends('components.admin.main')
@section('main-container')

<style>
    .bi-grid-fill{
       padding-top:15px !important;

   }
   .bi-box2{
       padding-top:14px !important;
   }
   .bi-tags{
       padding-top:14px !important;
   }
   .bi-people{
       padding-top:14px !important;
   }

   .bi-bar-chart{
       padding-top:14px !important;
   }
   .bi-box-arrow-right{
       padding-top:14px !important;
   }
</style>

<div class="container pt-4 pb-4">
  <div class="row justify-content-center">
    <div class="col-lg-9">
      <div class="kyc-form">
        {{-- <h6>Your account is not activated. Provide some basic details for verification purpose. After providing KYC details your account will be activated.</h6> --}}
        <h1 style="text-align: center">KYC Edit</h1>
        <form id="kycForm1" class="row pt-4" action="{{ url('kyc_edit/'.$data->owner_user_id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
          @csrf

          <div class="col-lg-6 mb-5">
            <label for="fullName">Full Name<small>(as per documents)</small></label>
            <input type="text" class="form-control" id="fullName" name="value1" value="{{ $data->fname ?? '' }}" required data-parsley-length="[1, 50]" title="Only alphabetic characters are allowed">
        </div>

          <div class="col-lg-6 mb-5">
            <label for="address">Address<small>(as per documents)</small></label>
            <input type="text" class="form-control" id="address" name="value2" value="{{ $data->address ?? ''}}" required data-parsley-length="[1, 50]">
          </div>
        <div class="col-lg-6 mb-5">
            <label for="sharedField">Government Id Number<small>(as per documents)</small></label>
            <input type="text" class="form-control" id="sharedField" value="{{ $data->unique_id ?? '' }}" name="sharedField" required data-parsley-length="[9, 16]">
        </div>
        <div class="col-lg-6 mb-5">
            <label for="sharedFieldConfirm">Government Id Number<small>(as per documents)</small></label>
            <input type="text" class="form-control" value="{{ $data->unique_id ?? ''}}" id="sharedFieldConfirm" name="sharedFieldConfirm" required data-parsley-equalto="#sharedField" data-parsley-length="[9, 16]">
        </div>
          <div class="col-lg-6 mb-5">
            <label for="country">Country</label>
            <select class="form-select" aria-label="Default select example" id="country" name="country" required>
                @foreach($countries as $country)
                <option {{($data->country == $country->id) ? 'selected':''}} value="{{ $country->id ?? ''}}">{{ $country->name }}</option>
                {{-- <option {{ (old('country') == $country->id || $country->name == 'USA') ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option> --}}
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 mb-5">
            <label for="state">State</label>
            <select class="form-select" aria-label="Default select example"  id="state" name="state" required>
                {{-- <option>{{ $data->state }}</option> --}}
                @foreach ($state as $item)
                <option {{($data->state == $item->name) ? 'selected':''}} value="{{ $item->name ?? ''}}">{{ $item->name }}</option>
                @endforeach

                {{-- <select class="form-select" aria-label="Default select example" id="state"  name="state" required> --}}
                    {{-- <option value="{{ $data->state }}" name="state" id="state"></option> --}}
            </select>
          </div>
          <div class="col-lg-6 mb-5">
            <label for="city">City</label>
            <input type="text" id="city" value="{{ $data->city ?? ''}}" name="city" class="form-control" required required data-parsley-length="[3, 25]">

          </div>
          <div class="col-lg-6 mb-5">
            <label for="zipCode">Zip Code</label>
            <input type="number" id="zipCode" value="{{ $data->zip_code ?? ''}}" name="zip_code" class="form-control" required required data-parsley-length="[6, 6]">
          </div>

          <h5>Documents</h5>

{{-- <div class="col-lg-6">
    <h5>Front</h5>
    <img src="{{ asset('images_uploade/'.$data->adhar_front) }}" height="100px" width="100px" alt="">
</div> --}}

<div class="col-lg-6">
    <h5>Front</h5>
    <a href="{{ asset('images_uploade/'.$data->adhar_front) }}" download>
        <i class="bi bi-download"></i>
        <img src="{{ asset('images_uploade/'.$data->adhar_front) }}" height="100px" width="100px" alt="">
    </a>
</div>




<div class="col-lg-6">
    <h5>Back</h5>
    <a href="{{ asset('images_uploade/'.$data->adhar_back) }}" download="">
        <i class="bi bi-download"></i>
    <img src="{{ asset('images_uploade/'.$data->adhar_back) }}" height="100px" width="100px" alt="">
</a>
</div>


          <div class="mb-4">
            <input type="file" class="form-control" name="image1" id="image1"  >
        </div>
        <div class="mb-4">

            <input type="file" class="form-control" name="image2" id="image2"  >
        </div>
        <div class="kyc-buttons pt-3">
            <button class="kyc-back-btn" type="submit">Update</button>
            <button class="kyc-back-btn"><a href="{{ url('total_owner') }}">Back</a></button>
          </div>
        <script>
            document.getElementById('image1').addEventListener('change', validateFile);
            document.getElementById('image2').addEventListener('change', validateFile);
            function validateFile(event) {
                const file = event.target.files[0];
                const maxSize = 25 * 1024 * 1024; // 25MB in bytes
                const fileType = file.type;
                if (!fileType.startsWith('image/') && fileType !== 'application/pdf') {
                    alert('Please upload only images or PDF files.');
                    event.target.value = ''; // Clear the file input
                    return;
                }
                if (file.size > maxSize) {
                    alert('File size exceeds the limit of 25MB.');
                    event.target.value = ''; // Clear the file input
                    return;
                }
            }
        </script>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script>
        <script>
            $(document).ready(function(){
                $("#country").change(function(){
                var country = $(this).val();
                // console.log(counrty);
                $.ajax({
                    url: "{{route('get_states')}}",
                    method: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        country: country,
                    },
                    cache:false,
                    success: function(data){
                        console.log(data);
                        $("#state").html(data);
                    }
                });
            });
            });
        </script>

        @if(session()->has('success'))
          <script>
            Swal.fire({
              icon: 'success',
              title: 'Congratulations',
              text: 'Client Added Successfully.'
            })
          </script>

        @endif
      </div>
    </div>
  </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
<script>
$('#kycForm').parsley();
</script>
