@extends('components.owner.main')
@section('main-container')
<script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</script>
<div class="container pt-4 pb-4">
  <div class="row justify-content-center">
    <div class="col-lg-9">
      <div class="kyc-form">
        <h6>Your account is not activated. Provide some basic details for verification purpose. After providing KYC details your account will be activated.</h6>
        <form id="kycForm" class="row pt-4" action="{{ url('kyc_post') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
          @csrf


        <div class="col-lg-6 mb-5">
            <label for="fullName">Full Name<small>(as per documents)</small></label>
            <input type="text" class="form-control" id="fullName" name="value1" required pattern="[A-Za-z\s]+" title="Only alphabetic characters and spaces are allowed"
            data-parsley-minlength="1" data-parsley-maxlength="50"

            >
            <div class="invalid-feedback">
                Please enter your full name using only alphabetic characters and spaces.
            </div>
        </div>


          <div class="col-lg-6 mb-5">
            <label for="address">Address<small>(as per documents)</small></label>
            <input type="text" class="form-control" id="address" name="value2" required
            data-parsley-minlength="8" data-parsley-maxlength="200"



            >
          </div>
        <div class="col-lg-6 mb-5">
            <label for="sharedField">Government Id Number<small>(as per documents)</small></label>
            <input type="text" class="form-control" id="sharedField" name="sharedField"
            data-parsley-minlength="8" data-parsley-maxlength="20"
            required


            >
        </div>
        <div class="col-lg-6 mb-5">
            <label for="sharedFieldConfirm">Government Confirm Id Number<small>(as per documents)</small></label>
            <input type="text" class="form-control" id="sharedFieldConfirm" name="sharedFieldConfirm" required data-parsley-equalto="#sharedField"
            >
        </div>
          <div class="col-lg-6 mb-5">
            <label for="country">Country</label>
            <select class="form-select" aria-label="Default select example" id="country" name="country" required>
                <option>United States</option>
              @foreach($countries as $country)
              <option {{ (old('country') == $country->id || $country->name == 'United state') ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
          @endforeach
            </select>
          </div>
          <div class="col-lg-6 mb-5">
            <label for="state">State</label>
            <select class="form-select" aria-label="Default select example" id="state" name="state" required>
            </select>
          </div>
          <div class="col-lg-6 mb-5">
            <label for="city" >City</label>
            <input type="text" id="zipCode" name="city" class="form-control"
            data-parsley-minlength="2" data-parsley-maxlength="50"
            required>
            {{-- <select class="form-select"  aria-label="Default select example" id="cities" name="city" required> --}}
              </select>
          </div>
          <div class="col-lg-6 mb-5">
            <label for="zipCode">Zip Code</label>
            <input type="number" id="zipCode" name="zip_code" class="form-control"
            data-parsley-minlength="6" data-parsley-maxlength="6"
            required
            onkeypress="return event.charCode>=6 && event.charCode<=6;"
            >
          </div>

          <h5>Documents</h5>
        <div class="mb-4">
            <h5>ID Card Front <small>(only accept  JPG, or PNG file.)</small></h5>
            <input type="file" class="form-control" name="image1" id="image1" required accept=".jpg,.jpeg,.png">
            <div class="invalid-feedback">
                Please upload JPG, or PNG file.
            </div>
            <small class="form-text text-muted">Maximum file size: 25MB</small>
        </div>

        <script>
            document.getElementById('image1').addEventListener('change', function() {
                var file = this.files[0];
                var maxSize = 25 * 1024 * 1024; // 25MB in bytes

                if (file && file.size > maxSize) {
                    this.setCustomValidity('File size must be less than 25MB');
                } else {
                    this.setCustomValidity('');
                }
            });
        </script>


        <div class="mb-4">
            <h5>ID Card Back<small>(only accept JPG, or PNG file.)</small></h5>
            <input type="file" class="form-control" name="image2" id="image2" required accept=".pdf,.jpg,.jpeg,.png">
            <div class="invalid-feedback">
                Please upload a JPG, or PNG file.
            </div>
            <small class="form-text text-muted">Maximum file size: 25MB</small>
        </div>

        <script>
            document.getElementById('image2').addEventListener('change', function() {
                var file = this.files[0];
                var maxSize = 25 * 1024 * 1024; // 25MB in bytes

                if (file && file.size > maxSize) {
                    this.setCustomValidity('File size must be less than 25MB');
                } else {
                    this.setCustomValidity('');
                }
            });
        </script>

        <div class="kyc-buttons pt-3">
            <button class="kyc-back-btn" type="submit">Submit</button>
            <button class="kyc-back-btn"><a href="{{ url('space_owner') }}">Back</a></button>
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

                // Check file size
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
                    url: 'get_states',
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
