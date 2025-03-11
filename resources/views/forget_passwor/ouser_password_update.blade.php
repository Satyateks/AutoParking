@extends('components.owner.main')

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



                      <form class="pt-4" action="{{ url('pass_post1') }}" method="POST" data-parsley-validate>
                        @csrf

                        <div class="mb-4">
                            <label for="password" class="form-label">Enter New Password</label>
                            <input class="form-control" id="password" type="password" name="password" required
                                   data-parsley-minlength="8" data-parsley-maxlength="20">
                            <span toggle="#password" class="bi bi-eye-fill field-icon toggle-password"></span>
                        </div>

                        <div class="mb-4">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input class="form-control" id="confirm_password" type="password" name="confirm_password" required
                                   data-parsley-equalto="#password" data-parsley-minlength="8" data-parsley-maxlength="20">
                            <span toggle="#confirm_password" class="bi bi-eye-fill field-icon toggle-password"></span>
                            <div id="password_error" class="pass-form-text"></div>
                        </div>

                        <div class="landing-buttons1 pt-2">
                            <button type="submit">Continue</button>
                        </div>
                    </form>


                   <!-- Include Parsley CSS (optional) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.css">

<!-- Include Parsley JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>



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
