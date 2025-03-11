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

        <form id="kycForm" class="row pt-4" action="{{ url('listing_details') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
          @csrf
          <div class="col-lg-6 mb-5">
            <label for="address">Our Total Clients</label>
            <input type="NUMBER" class="form-control" id="address" value="{{ $data->value1 }}" name="value1" required maxlength="11">
          </div>
        <div class="col-lg-6 mb-5">
            <label for="sharedField">Parking Space Listed</label>
            <input type="NUMBER" class="form-control" id="sharedField" value="{{ $data->value2 }}" name="value2" required maxlength="11">
        </div>
        <div class="col-lg-6 mb-5">
            <label for="sharedFieldConfirm">Space Owner</label>
            <input type="NUMBER" class="form-control" id="sharedFieldConfirm" value="{{ $data->value3 }}" name="value3" required maxlength="11">
        </div>
        <div class="kyc-buttons pt-3">
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
        </form>
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
