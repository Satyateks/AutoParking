@extends('components.owner.main')
@section('main-container')

<div class="container pt-4 pb-4">
  <div class="row justify-content-center">
    <div class="col-lg-9">
      <div class="kyc-form">
        {{-- <h6>Your account is not activated. Provide some basic details for verification purpose. After providing KYC details your account will be activated.</h6> --}}
        <form id="kycForm" class="row pt-4" action="{{ url('parking_edit/'.$id->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
          @csrf
          <div class="step-number pb-4">
            <i class="fa-solid fa-circle-check me-3"></i>
            <h6 class="me-3 pt-1">Step 1</h6>
            <i class="fa-solid fa-angle-right me-3 "></i>
        </div>
        <div class="col-lg-6 mb-5">
            <label for="fullName">Enter Your Zip Code   <small>(as per documents)</small></label>
            <input type="number" class="form-control" id="fullName" name="value1" value="{{ $id->zip_code }}" required  title="Only alphabetic characters and spaces are allowed" maxlength="6" minlength="6">
            <div class="invalid-feedback">
                Please enter your full name using only alphabetic characters and spaces.
            </div>
        </div>
          <div class="col-lg-6 mb-5">
            <label for="">What type of space do you have?</label>
                            <p><select class="form-select" aria-label="Default select example" name="type_of_space" oninput="this.className = 'form-control'">
                                <option>{{$id->type_of_space}}</option>
                                @foreach ($all as $item)
                                 <option>{{ $item->v1 }}</option>
                                @endforeach
                              </select></p>
                        </div>
                    <div>

                <div class="tab">
                    <div class="step-number pb-4">
                        <i class="fa-solid fa-circle-check me-3"></i>
                        <h6 class="me-3 pt-1">Step 2</h6>
                        <i class="fa-solid fa-angle-right me-3 "></i>
                    </div>
                  <div class="mb-5">
                    <label for="">What Type Of Vehicle do you have?</label>

                  @if($id->vehicle_type=='1')
                    <div class="vehicle-size">
                        <div class="radio-class"> <div class="form-check radio-check me-1">
                          <input class="form-check-input" type="radio" value="1" name="flexRadioDisabled" id="flexRadioDisabled" checked>
                        </div> <h5>Small Size</h5></div>
                        <div><img src="{{ asset('user/images/small.png') }}"alt=""></div>
                      </div>
                      <div class="vehicle-size">
                        <div class="radio-class"> <div class="form-check radio-check me-1">
                          <input class="form-check-input" type="radio" value="2" name="flexRadioDisabled" id="flexRadioDisabled" >
                        </div> <h5>Medium Size</h5></div>
                        <div><img src="{{ asset('user/images/medium.png') }}"alt=""></div>
                      </div>
                      <div class="vehicle-size">
                        <div class="radio-class"> <div class="form-check radio-check me-1">
                          <input class="form-check-input" type="radio" value="3" name="flexRadioDisabled" id="flexRadioDisabled">
                        </div> <h5>Large Size</h5></div>
                        <div><img src="{{ asset('user/images/large.png') }}"alt=""></div>
                      </div>
                      <div class="vehicle-size">
                        <div class="radio-class"> <div class="form-check radio-check me-1">
                          <input class="form-check-input" type="radio" value="4" name="flexRadioDisabled" id="flexRadioDisabled">
                        </div> <h5>Extra large Size</h5></div>
                        <div><img src="{{ asset('user/images/xl.png') }}"alt=""></div>
                      </div>
@elseif($id->vehicle_type=='2')
<div class="vehicle-size">
    <div class="radio-class"> <div class="form-check radio-check me-1">
      <input class="form-check-input" type="radio" value="1" name="flexRadioDisabled" id="flexRadioDisabled" >
    </div> <h5>Small Size</h5></div>
    <div><img src="{{asset('user/images/small.png')}}"alt=""></div>
  </div>
  <div class="vehicle-size">
    <div class="radio-class"> <div class="form-check radio-check me-1">
      <input class="form-check-input" type="radio" value="2" name="flexRadioDisabled" id="flexRadioDisabled" checked>
    </div> <h5>Medium Size</h5></div>
    <div><img src="{{ asset('user/images/medium.png') }}"alt=""></div>
  </div>
  <div class="vehicle-size">
    <div class="radio-class"> <div class="form-check radio-check me-1">
      <input class="form-check-input" type="radio" value="3" name="flexRadioDisabled" id="flexRadioDisabled">
    </div> <h5>Large Size</h5></div>
    <div><img src="{{ asset('user/images/large.png') }}"alt=""></div>
  </div>
  <div class="vehicle-size">
    <div class="radio-class"> <div class="form-check radio-check me-1">
      <input class="form-check-input" type="radio" value="4" name="flexRadioDisabled" id="flexRadioDisabled">
    </div> <h5>Extra large Size</h5></div>
    <div><img src="{{ asset('user/images/xl.png') }}"alt=""></div>
  </div>
@elseif($id->vehicle_type=='3')

<div class="vehicle-size">
    <div class="radio-class"> <div class="form-check radio-check me-1">
      <input class="form-check-input" type="radio" value="1" name="flexRadioDisabled" id="flexRadioDisabled" >
    </div> <h5>Small Size</h5></div>
    <div><img src="{{ asset('user/images/small.png') }}"alt=""></div>
  </div>
  <div class="vehicle-size">
    <div class="radio-class"> <div class="form-check radio-check me-1">
      <input class="form-check-input" type="radio" value="2" name="flexRadioDisabled" id="flexRadioDisabled" >
    </div> <h5>Medium Size</h5></div>
    <div><img src="{{ asset('user/images/medium.png') }}"alt=""></div>
  </div>
  <div class="vehicle-size">
    <div class="radio-class"> <div class="form-check radio-check me-1">
      <input class="form-check-input" type="radio" value="3" name="flexRadioDisabled" id="flexRadioDisabled" checked>
    </div> <h5>Large Size</h5></div>
    <div><img src="{{ asset('user/images/large.png') }}"alt=""></div>
  </div>
  <div class="vehicle-size">
    <div class="radio-class"> <div class="form-check radio-check me-1">
      <input class="form-check-input" type="radio" value="4" name="flexRadioDisabled" id="flexRadioDisabled">
    </div> <h5>Extra large Size</h5></div>
    <div><img src="{{ asset('user/images/xl.png') }}"alt=""></div>
  </div>
@else

<div class="vehicle-size">
    <div class="radio-class"> <div class="form-check radio-check me-1">
      <input class="form-check-input" type="radio" value="1" name="flexRadioDisabled" id="flexRadioDisabled" >
    </div> <h5>Small Size</h5></div>
    <div><img src="{{ asset('user/images/small.png') }}"alt=""></div>
  </div>
  <div class="vehicle-size">
    <div class="radio-class"> <div class="form-check radio-check me-1">
      <input class="form-check-input" type="radio" value="2" name="flexRadioDisabled" id="flexRadioDisabled" >
    </div> <h5>Medium Size</h5></div>
    <div><img src="{{ asset('user/images/medium.png') }}"alt=""></div>
  </div>
  <div class="vehicle-size">
    <div class="radio-class"> <div class="form-check radio-check me-1">
      <input class="form-check-input" type="radio" value="3" name="flexRadioDisabled" id="flexRadioDisabled" >
    </div> <h5>Large Size</h5></div>
    <div><img src="{{ asset('user/images/large.png') }}"alt=""></div>
  </div>
  <div class="vehicle-size">
    <div class="radio-class"> <div class="form-check radio-check me-1">
      <input class="form-check-input" type="radio" value="4" name="flexRadioDisabled" id="flexRadioDisabled"checked>
    </div> <h5>Extra large Size</h5></div>
    <div><img src="{{ asset('user/images/xl.png') }}"alt=""></div>
  </div>
@endif
                  </div>
                </div>


                    <div class="step-number pb-4">
                      <i class="fa-solid fa-circle-check me-3"></i>
                      <h6 class="me-3 pt-1">Step 3</h6>
                      <i class="fa-solid fa-angle-right me-3 "></i>
                  </div>
                  <div class="mb-4 pb-2">
                    <label for="">Do you have an electric vehicle charger?</label>
                    <div class="select-btns pt-1">
                     @if($id->vahicle_charge=='0')
                      <button type="button" class="me-3 d-flex"><div class="form-check radio-check me-1">
                        <input class="form-check-input" type="radio" value="0" name="flexRadioDisabled1" id="flexRadioDisabled" checked>
                      </div> Yes</button>
                      <button type="button" class="me-3 d-flex"><div class="form-check radio-check me-1">
                        <input class="form-check-input" type="radio" value="1" name="flexRadioDisabled1" id="flexRadioDisabled">
                      </div> No</button>
                      @elseif($id->vahicle_charge=='1')
                      <button type="button" class="me-3 d-flex"><div class="form-check radio-check me-1">
                        <input class="form-check-input" type="radio" value="0" name="flexRadioDisabled1" id="flexRadioDisabled" >
                      </div> Yes</button>
                      <button type="button" class="me-3 d-flex"><div class="form-check radio-check me-1">
                        <input class="form-check-input" type="radio" value="1" name="flexRadioDisabled1" id="flexRadioDisabled" checked>
                      </div> No</button>
                      @endif
                    </div>
                  </div>
                  <div class="mb-5">
                    <label for="">Do you want to share your electric vehicle charger with
                      drivers?</label>
                      <div class="select-btns pt-1">
                        @if($id->vaicle_share=='0')
                          <button type="button" class="me-3 d-flex"><div class="form-check radio-check me-1">
                            <input class="form-check-input" type="radio" value="0" name="flexRadioDisabled2" id="flexRadioDisabled1" checked>
                          </div> Yes</button>
                          <button type="button" class="me-3 d-flex"><div class="form-check radio-check me-1">
                            <input class="form-check-input" type="radio" value="1" name="flexRadioDisabled2" id="flexRadioDisabled1">
                          </div> No</button>
                          @elseif($id->vaicle_share=='1')
                          <button type="button" class="me-3 d-flex"><div class="form-check radio-check me-1">
                            <input class="form-check-input" type="radio" value="0" name="flexRadioDisabled2" id="flexRadioDisabled1" >
                          </div> Yes</button>
                          <button type="button" class="me-3 d-flex"><div class="form-check radio-check me-1">
                            <input class="form-check-input" type="radio" value="1" name="flexRadioDisabled2" id="flexRadioDisabled1" checked>
                          </div> No</button>
                          @endif
                        </div>
                  </div>


                  <div class="">
                    <div class="step-number pb-4">
                      <i class="fa-solid fa-circle-check me-3"></i>
                      <h6 class="me-3 pt-1">Step 4</h6>
                      <i class="fa-solid fa-angle-right me-3 "></i>
                  </div>
                  <div class="mb-5 radio-check" >
                      <label for="">What type of bookings do you want?</label>
                      @if($id->booking_want=='1')
                      <div class="row booking-type radio-booking-type" style=" --bs-gutter-x: 1px !important;">
                        <div class="radio-btn col-1"><input class="form-check-input mt-3" value="1" name="name" type="radio" id="flexRadioDefault1" checked></div>
                        <div class="col-11">
                          <h4>All bookings (maximum earnings)</h4>
                          <h6>Accept both monthly and standard (hourly / daily) bookings.</h6>
                      </div>
                      </div>
                      <div class="row booking-type radio-booking-type" style=" --bs-gutter-x: 1px !important;">
                        <div class="radio-btn col-1"><input class="form-check-input mt-3" value="2" name="name" type="radio" id="flexRadioDefault2" ></div>
                        <div class="col-11">
                          <h4>Standard Bookings</h4>
                          <h6>Accept both monthly and standard (hourly / daily) bookings.</h6>
                      </div>
                      </div>
                      <div class="row booking-type radio-booking-type" style=" --bs-gutter-x: 1px !important;">
                        <div class="radio-btn col-1"><input class="form-check-input mt-4" value="3" name="name" type="radio" id="flexRadioDefault3" ></div>
                        <div class="col-11">
                          <h4>Monthly Bookings</h4>
                          <h6>Accepting monthly rolling bookings means that a single driver will use
                            this space. You will receive a regular monthly income.</h6>
                      </div>
                      </div>
                      @elseif($id->booking_want=='2')
                      <div class="row booking-type radio-booking-type" style=" --bs-gutter-x: 1px !important;">
                        <div class="radio-btn col-1"><input class="form-check-input mt-3" value="1" name="name" type="radio" id="flexRadioDefault1" ></div>
                        <div class="col-11">
                          <h4>All bookings (maximum earnings)</h4>
                          <h6>Accept both monthly and standard (hourly / daily) bookings.</h6>
                      </div>
                      </div>
                      <div class="row booking-type radio-booking-type" style=" --bs-gutter-x: 1px !important;">
                        <div class="radio-btn col-1"><input class="form-check-input mt-3" value="2" name="name" type="radio" id="flexRadioDefault2" checked></div>
                        <div class="col-11">
                          <h4>Standard Bookings</h4>
                          <h6>Accept both monthly and standard (hourly / daily) bookings.</h6>
                      </div>
                      </div>
                      <div class="row booking-type radio-booking-type" style=" --bs-gutter-x: 1px !important;">
                        <div class="radio-btn col-1"><input class="form-check-input mt-4" value="3" name="name" type="radio" id="flexRadioDefault3" ></div>
                        <div class="col-11">
                          <h4>Monthly Bookings</h4>
                          <h6>Accepting monthly rolling bookings means that a single driver will use
                            this space. You will receive a regular monthly income.</h6>
                      </div>
                      </div>
                      @elseif($id->booking_want=='3')
                      <div class="row booking-type radio-booking-type" style=" --bs-gutter-x: 1px !important;">
                        <div class="radio-btn col-1"><input class="form-check-input mt-3" value="1" name="name" type="radio" id="flexRadioDefault1" ></div>
                        <div class="col-11">
                          <h4>All bookings (maximum earnings)</h4>
                          <h6>Accept both monthly and standard (hourly / daily) bookings.</h6>
                      </div>
                      </div>
                      <div class="row booking-type radio-booking-type" style=" --bs-gutter-x: 1px !important;">
                        <div class="radio-btn col-1"><input class="form-check-input mt-3" value="2" name="name" type="radio" id="flexRadioDefault2" ></div>
                        <div class="col-11">
                          <h4>Standard Bookings</h4>
                          <h6>Accept both monthly and standard (hourly / daily) bookings.</h6>
                      </div>
                      </div>
                      <div class="row booking-type radio-booking-type" style=" --bs-gutter-x: 1px !important;">
                        <div class="radio-btn col-1"><input class="form-check-input mt-4" value="3" name="name" type="radio" id="flexRadioDefault3" checked></div>
                        <div class="col-11">
                          <h4>Monthly Bookings</h4>
                          <h6>Accepting monthly rolling bookings means that a single driver will use
                            this space. You will receive a regular monthly income.</h6>
                      </div>
                      </div>
                      @endif
                    </div>
                  </div>


                  <div class="step-number pb-4">
                    <i class="fa-solid fa-circle-check me-3"></i>
                    <h6 class="me-3 pt-1">Step 5</h6>
                    <i class="fa-solid fa-angle-right me-3 "></i>
                </div>
            <div class="mb-5">
                <label for="">Select Your Country</label>

                  {{-- <select class="form-select" aria-label="Default select example" id="country" name="country" required>
                    @foreach($countries as $country) --}}
           {{-- <option {{ (old('country') == $country->id || $country->name == 'USA') ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option> --}}
                    {{-- <option {{($id->country == $country->id) ? 'selected':''}} value="{{ $country->id ?? ''}}">{{ $country->name }}</option>
                    @endforeach
                  </select> --}}

                           <label for="country">Country</label>
                              <select class="form-select" aria-label="Default select example" id="country" name="country" required>
                                  {{-- <option>{{  $country->id }}</option> --}}
                                @foreach($countries as $country)
                                <option {{ ($id->country == $country->id || $country->name == 'United state') ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                              @endforeach
                              </select>
                            </p>
            </div>


            {{-- <div class="mb-5">

                <label for="state">State</label>
                                <select class="form-select" aria-label="Default select example" id="state" name="state" required>
                                @foreach ($state as $item)
                                <option {{($data->state == $item->name) ? 'selected':''}} value="{{ $item->name ?? ''}}">{{ $item->name }}</option>
                                @endforeach
                            </select>
        </div> --}}

        <div class="mb-5">
            <label for="state">State</label>
            <select class="form-select" aria-label="Default select example" id="state" name="state" required>
            @foreach ($state as $item)
            <option {{($data->state == $item->name) ? 'selected':''}} value="{{ $item->name ?? ''}}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

        <div class="mb-5">
            <label for="state">City</label>
            <p><input placeholder="Enter your city"  name="city" class="form-control" value="{{ $id->city }}" required maxlength="45"></p>
    </div>


            <label for="">Full Address</label>
            <p><input placeholder="456 North Anderson Drive Aberdeen, AB16 7GL" oninput="this.className = 'form-control'" value="{{ $id->address }}" name="address" class="form-control"></p>


             <div class="step-number pb-4">
                <i class="fa-solid fa-circle-check me-3"></i>
                <h6 class="me-3 pt-1">Step 6</h6>
                <i class="fa-solid fa-angle-right me-3 "></i>
            </div>
          <div class="mb-5">
            {{-- <div class="mb-5">
              <label for="">Latitude</label>
              <p><input type="number" placeholder="" oninput="this.className = 'form-control'"  name="lat" value="{{ $id->lat }}"  class="form-control" required ></p>
          </div>
            <label for="">Longitude</label>
            <p><input type="number" placeholder="" oninput="this.className = 'form-control'"  name="lng" value="{{ $id->lng }}" class="form-control" required></p>
          </div> --}}

          <div class="mb-5">
            <label for="lat">Latitude</label>
            <p><input type="float" placeholder="" name="lat" id="lat" value="{{ $id->lat }}" class="form-control" required min="-90" max="90"></p>
        </div>

        <div class="mb-5">
            <label for="lng">Longitude</label>
            <p><input type="float" placeholder="" name="lng" id="lng" value="{{ $id->lng }}" class="form-control" required min="-180" max="180"></p>
        </div>



                   <div class="step-number pb-4">
                              <i class="fa-solid fa-circle-check me-3"></i>
                              <h6 class="me-3 pt-1">Step 7</h6>
                              <i class="fa-solid fa-angle-right me-3 "></i>
                          </div>
            <div class="mb-5">
                <label for="">Set the pricing for your space</label> <br>
                <div class="space-pricing">
                  <div class="d-flex">
                    <i class="bi bi-clock me-3"></i>
                  <h6 class="pt-1">Hourly</h6>
                  </div>
                  <div>
                    <input type="number" name="hour" value="{{ $id->hourly ?? '' }}" class="form-control" oninput="this.className = 'form-control'" placeholder="$ 1.30" required maxlength="11">
                  </div>
                </div>
                <div class="space-pricing">
                  <div class="d-flex">
                    <i class="bi bi-calendar-check me-3"></i>
                  <h6 class="pt-1">Daily</h6>
                  </div>
                  <div>
                    <input type="number" name="daily" value="{{ $id->daily }}" class="form-control" oninput="this.className = 'form-control'" placeholder="$ 1.30" required maxlength="11">
                  </div>
                </div>
                <div class="space-pricing">
                  <div class="d-flex">
                    <i class="bi bi-calendar-check me-3"></i>
                  <h6 class="pt-1">Weekly</h6>
                  </div>
                  <div>
                    <input type="number" name="weekly" value="{{ $id->weekly }}" class="form-control" oninput="this.className = 'form-control'" placeholder="$ 1.30" required maxlength="11">
                  </div>
                </div>
                <div class="space-pricing">
                  <div class="d-flex">
                    <i class="bi bi-calendar-check me-3"></i>
                  <h6 class="pt-1">Monthly</h6>
                  </div>
                  <div>
                    <input type="number" name="monthly" value="{{ $id->monthly }}" class="form-control" oninput="this.className ='form-control'" placeholder="$ 1.30" required maxlength="11">
                  </div>
                </div>
            </div>

            <div class="step-number pb-4">
                <i class="fa-solid fa-circle-check me-3"></i>
                <h6 class="me-3 pt-1">Step 8</h6>
                <i class="fa-solid fa-angle-right me-3 "></i>
            </div>

            <div class="mb-5">
                <img src="{{ asset('images_uploade/'.$id->image) }}" width="100px" height="100px" alt="">

            </div>
            {{-- <div class="mb-5">
                <label for="">Add Photos</label> <br>
                <small>Photos encourage trust and make your space stand out.</small>
               <input type="file" name="image" value="{{ $id->image }}" oninput="this.className = 'form-control'" class="form-control" style="height: auto;" required>
            </div> --}}

            <div class="mb-5">
                <label for="image">Add Photos</label> <br>
                <small>Photos encourage trust and make your space stand out.</small>
                <input type="file" id="imageInput" name="image" oninput="this.className = 'form-control'" class="form-control" style="height: auto;">
            </div>

            <script>
                document.getElementById('kycForm').addEventListener('submit', function(event) {
                    var imageInput = document.getElementById('imageInput');
                    if (imageInput.files.length === 0) {
                         {{ $id->image }}
                        imageInput.value = '{{ $id->image }}';
                    }

                });
            </script>


            <div class="mb-5">
              <label for="">Write a description</label>
              <textarea class="form-control" id="description" name="description" rows="3" placeholder="1 space located on North Anderson Drive in Aberdeen. The space is big enough to fit large vehicles" data-parsley-required="true" data-parsley-maxlength="400"  maxlength="250" minlength="10" required>{{ $id->description }}</textarea>
          </div>
          <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>


        <div class="kyc-buttons pt-3">
          <button class="kyc-back-btn"><a href="{{ url('raushan_details') }}">Back</a></button>

            <button class="kyc-back-btn" type="submit">Update</button>
          </div>
        </form>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
<script>
    $(document).ready(function(){
        $("#country").change(function(){
        var country = $(this).val();
        // console.log(counrty);
        $.ajax({
             url: "{{route('get_states')}}",
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
