
  <div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 loginouter-box">
            <form class="otp-box login-box" method="POST" action="{{ route('save_password') }}">
              @csrf
              <input type="hidden" name="local_time" class="localtime" />
              <input type="hidden" name="email" value="{{ $email }}" />
                <h3 class="mb-5 text-center">New Password</h3>
                <div class="mb-4">
                    <input type="password" name="password" class="form-control mb-2 @error('password') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter New Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  </div>
                  <div class="mb-4">
                    <input type="password" name="password_confirmation" class="form-control mb-2 @error('password_confirmation') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Confirm Password">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary mb-4 form-control">Confirm</button>
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>
  </div>
  @if(session()->has('nouser'))
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops..',
      text: 'No user found.'
    })
  </script>
  @endif

