@extends('components.user.main')

@section('main-container')

 <div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4" style="min-width: 500px;">
          <div class="card bg-white mb-5 mt-5 border-0" style="box-shadow: 0 12px 15px rgba(0, 0, 0, 0.02);">
            <div class="card-body p-5 text-center">
              <h4>Verify</h4>

              <p>Your code was sent to you via email</p>
         <form action="{{ url('onwer_otp_varification_page') }}" method="POST">
            @csrf
              {{-- <div class="otp-field mb-4">

                    <input type="text" name="owner_otp" class="form-control">
              </div> --}}

              <div class="otp-field mb-4">
                <input type="text" name="owner_otp"  class="form-control" id="password-field"
                       pattern="[0-9]{4}" title="Please enter a 4-digit numeric OTP"
                       required data-parsley-minlength="4" data-parsley-maxlength="4"
                       data-parsley-whitespace="squish"
                       data-parsley-errors-container="#otp-error-container">
                <div id="otp-error-container"></div>
            </div>

              <button class="btn btn-primary mb-3" type="submit">
                Verify
              </button>
            </form>
            <div class="alert alert-success">
                <h5>{{ Session('email1') }}</h5>
                {{ session('msg') }}
            </div>
              <p class="resend text-muted mb-0">
                Didn't receive code? <a href="{{ url('owner_resend_otp') }}">Request again</a>
              </p>
            </div>
          </div>
        </div>
      </div>

 </div>

   @endsection()
