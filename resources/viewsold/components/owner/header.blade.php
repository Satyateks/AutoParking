<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rent Space Form</title>
    <link rel="stylesheet" href="{{ asset('onwer/style.css') }}" />
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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="{{asset('admin/parsley/parsleycss.css')}}" />

  </head>
  <body>
    @if ($message = Session::get('msg'))
    <input type="hidden" name="msg" id="msg" value="{{$message}}">
    @endif
    @if ($message = Session::get('error'))
    <input type="hidden" name="error" id="error" value="{{$message}}">
    @endif

    <nav class="index-nav">
      <div class="logo">
        <img src="{{ asset('onwer/images/logo.png') }}" alt="Logo Image" />
      </div>
      <div class="hamburger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-links pt-2">
        <li><a href="{{ url('index') }}">Home</a></li>
        <li><a href="{{ url('space_owner') }}">Rent out your space</a></li>
        <li><a href="{{ url('owner_contact') }}">Contact Us</a></li>
        <li><a href="{{ url('owner_about') }}">About us</a></li>
        <li><a href="{{ url('owner_how_to_works') }}">How its works</a></li>
        <div class="nav-buttons">
          <li>



           @if (Auth::guard('owner')->user())
           <div class="dropdown-toggle"
           id="dropdownMenuButton1"
           data-bs-toggle="dropdown"
           aria-expanded="false">
           {{ Auth()->guard('owner')->user()->name }}
        </div>

            {{-- <button
                class="dropdown-toggle"
                id="dropdownMenuButton1"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                {{ Auth()->guard('owner')->user()->name }}
              </button> --}}
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ url('onwer_profile') }}">Profile</a></li>
                <li><a class="dropdown-item" href="{{ url('raushan_details') }}">My Space</a></li>
                <li><a class="dropdown-item" href="{{ url('rent_space') }}">Add Space</a></li>
                <li><a class="dropdown-item" href="{{ url('bank_details') }}">Bank Details</a></li>
                <li><a class="dropdown-item" href="{{ url('owner_recent_order') }}">Recent Order</a></li>
                <li><a class="dropdown-item" href="{{ url('kyc_data') }}">KYC DATA</a></li>
                <li><a class="dropdown-item" href="{{ url('owner_payout') }}">Payout History</a></li>
                <li><a class="dropdown-item" href="{{ url('owner_logout') }}">Logout</a></li>




              </ul>
         @else


         @if(Auth::user())
         <div class="dropdown-toggle"
         id="dropdownMenuButton1"
         data-bs-toggle="dropdown"
         aria-expanded="false">
         {{ Auth()->user()->name }}
      </div>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="{{ url('user_profile') }}">Profile</a></li>

        {{-- <li><a class="dropdown-item" href="{{ url('user_recent_order') }}">Recent Order</a></li> --}}
        <li><a class="dropdown-item" href="{{ url('booking') }}">Recent Bookings</a></li>
        <li><a class="dropdown-item" href="{{ url('user_logout') }}">Logout</a></li>

      </ul>
      @else

         <div class="nav-buttons">
            <li>
              <button
                class="login-button me-4 pt-2 mt-1"
                href=""
                onclick="location.href = '{{ url('owner_login') }}';"
              >
                <i class="bx bxs-lock"></i> Login
              </button>
            </li>
            <li class="tel-number">
              <a href="tel:(91) 000 000 0000">
                <i class="bx bxs-phone-call"></i> (+44) 7484878778</a
              >
            </li>
          </div>

@endif
  @endif
            <div class="dropdown">

            </div>
          </li>
        </div>
      </ul>
    </nav>
