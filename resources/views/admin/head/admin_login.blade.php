<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('user/style.css') }}" />
    <link rel="stylesheet" href="{{asset('admin/parsley/parsleycss.css')}}" />

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
  </head>
  <body>
    @if ($message = Session::get('msg'))
    <input type="hidden" name="msg" id="msg" value="{{$message}}">
    @endif
    @if ($message = Session::get('error'))
    <input type="hidden" name="error" id="error" value="{{$message}}">
    @endif
    <div class="container-fluid">
        <div class="row" style="align-items: center;">
            <div class="col-lg-6 form-column pt-5 pb-5">
                <div class="img-section">
                    <img src="{{ asset('user/images/reg.svg') }}" alt="">
                    <h5 class="pt-5">Login Your Account  <br> As Admin</h5>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-4 form-column2 pt-5">
                <div class="form-section">
                    <img src="images/hand.png" alt="">
                    <h5>Welcome to admin panel</h5>
                    <h6>Please login to access your account.</h6>
                    <form class="" action="{{ url('admin_login_post') }}" method="POST" data-parsley-validate>
                        @csrf
                        <div class="mb-4 pt-3">
                            <label for="exampleInputEmail1" class="form-label">E-mail </label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" required data-parsley-whitespace="squish">
                          </div>
                          <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input class="form-control" id="password-field" type="password" name="password" placeholder="Enter your password" data-parsley-required-message='Password is required'
                            data-parsley-minlength="8" data-parsley-maxlength="16"
                            required data-parsley-whitespace="squish">
                            <span toggle="#password-field" class="bi bi-eye-fill field-icon toggle-password"></span>
                          </div>

                      <button class="mt-4"
                       {{-- onclick="location.href = '{{ url('index') }}';" --}}
                       >Login</button>
                    </form>

                </div>
            </div>
            <div class="col-lg-1"></div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

    <script src="{{ asset('user/script.js') }}"></script>
    <script src="{{asset('admin/parsley/parsley.min.js')}}"></script>

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
    <script>
      $msg = $('#msg').val();
      if($msg !='' && $msg != undefined)
      {

              iziToast.success({
              message: $msg,
              position: "topCenter"
          })

      }
      $msg=$('#error').val();
      if($msg !='' && $msg != undefined)
      {
              iziToast.error({
              message: $msg,
              position: "topCenter"

          });
      }
    </script>
  </body>
</html>
