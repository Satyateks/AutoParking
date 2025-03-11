<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Auto Park</title>

</head>

<body style="background: #F5F5F5; font-family:calibri;margin:0px;">
    <h1 style="text-align:center;padding:20px;">Auto Park</h1>
    <div style="margin:40px 0px;">
        <div style="border-radius: 10px;width:50%;background:white;padding-bottom:40px;position:relative;margin:auto;">
            <h2 style="text-align:center;padding:20px 0px;">Welcome</h2>
            <div style="margin-bottom:20px;">

                <div style="text-align: center;">
                    <img src="{{ asset('images/logo.png') }}" width="150px" height="auto"
                    style="border: 1px solid lightgrey; border-radius: 7px; padding: 15px 25px; position: relative; margin: auto; display: block;" alt="">
                </div>


            </div>
            <div style="padding: 0px 30px;">
                <div style="margin-bottom:40px;">


                    {{-- <p><strong>Hello {{ $data->name }}</strong></p> --}}
                    <p>
                        Thanks for Joining. We're really excited to have you on board.<br>
                        Your Email Verification OTP is
                        <center> <button style="background-color: #87200A; color: #fff; padding: 8px 15px; font-weight: 600; border: none; border-radius: 5px;"> {{ $data->otp }} </button> </center>
                    </p>
                </div>
                {{-- <div class="col text-center mb-5">
                                <button class="btn btn-primary">Login to your Account</button>
                            </div> --}}
                <div style="margin-bottom:40px;">
                    @if(isset($data->message))
                    <p>Name : {{$data->name}}</p>
                    <p>Email : {{$data->email}}</p>
                    <p>Phone : {{$data->phone}}</p>
                    <p>Country : {{$data->country}}</p>
                    <p>City : {{$data->city}}</p>
                    <p>Message : {{$data->message}}</p>
                    @else
                    <p><strong>Have a question?</strong></p>
                    <p>Check our <strong>FAQ Page</strong> for a quick answer.</p>
                    <p>
                        You can always contact our support team via live chat and email.<br>
                        We will be happy to help you!
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <footer style="text-align:center;background:#695EEE;magrin:20px 0px;color:white;">
        <p style="text-align:center;">132 Dartmouth Street Boston, Massachusetts 02156 United States</p>
    </footer>
</body>

</html>
