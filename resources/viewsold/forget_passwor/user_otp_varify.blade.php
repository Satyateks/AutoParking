
@extends('components.user.main')

@section('main-container')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password</title>
    <link rel="stylesheet" href="user/style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    />
    <link rel="stylesheet" href="{{asset('admin/parsley/parsleycss.css')}}" />

  </head>
  <body>

    <div class="container pt-5">
        <div class="row register-row">
            <div class="col-lg-5">
                <div class="register-column">
                    <div style="text-align: center">
                        <h5>Autopark</h5>
                        <h6>Forgot Password</h6>
                    </div>
                    <form class="pt-4" action="{{ url('otp_varify') }}" method="POST" data-parsley-validate>
                        @csrf
                          <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Enter OTP</label>

                            <div class="otp-field mb-4">
                                <input type="text" name="otp" class="form-control" id="password-field"
                                       pattern="[0-9]{4}" title="Please enter a 4-digit numeric OTP"
                                       required data-parsley-minlength="4" data-parsley-maxlength="4"
                                       data-parsley-whitespace="squish"
                                       data-parsley-errors-container="#otp-error-container">
                                <div id="otp-error-container"></div>
                            </div>
                          </div>
                          {{-- <div class="alert alert-success">
                            {{ session('msg') }}
                        </div> --}}
                          <div class="mb-4 verify-pass-btn">
                            <p class="resend text-muted text-center">
                                Didn't receive code? <a href="{{ url('uresend') }}">Request again</a>
                              </p>
                              <button class="btn-primary mb-3" >
                                Verify
                              </button>
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="user/script.js"></script>
    <script>
      $(".toggle-password").click(function() {

$(this).toggleClass("bi bi-eye-slash-fill");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
    </script>
  </body>
</html>

@endsection()
