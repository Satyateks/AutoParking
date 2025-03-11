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
                        Forget Password OTP Verification.<br><strong> Hello  </strong> <br>
                        You are receiving this email because we received a password reset request for your account.
                        <center> <button style="background-color: #87200A; color: #fff; padding: 8px 15px; font-weight: 600; border: none; border-radius: 5px;"> {{ $otp }} </button> </center>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <footer style="text-align:center;background:#695EEE;magrin:20px 0px;color:white;">
        <p style="text-align:center;">132 Dartmouth Street Boston, Massachusetts 02156 United States</p>
    </footer>
</body>

</html>
