@extends('components.owner.main')

@section('main-container')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 left-space-column">
            <div class="row space-image-row">
                <div class="col-lg-9 pt-5 pb-5">
                    <img src="{{ ('onwer/images/rent.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-6 right-space-column">
            <div class="row space-image-row">
                <div class="col-lg-8 pt-5 pb-5">
                    <form id="regForm" action="{{ url('rent_space_post') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">
                            <div class="step-number pb-4">
                                <i class="fa-solid fa-circle-check me-3"></i>
                                <h6 class="me-3 pt-1">Step 1</h6>
                                <i class="fa-solid fa-angle-right me-3 "></i>
                            </div>
                          <div class="mb-5">
                            <label for="">Enter your Zip Code</label>
                            <p><input type="number" placeholder="Zip Code"  name="zip_code" class="form-control" required maxlength="6" minlength="6"></p>
                          </div>

                          {{-- <div class="mb-5">
                            <label for="">Enter your city</label>
                            <p><input type="number" placeholder="city"  name="zip_code" class="form-control" required maxlength="6" minlength="6"></p> --}}
                          {{-- </div> --}}

                        <div class="mb-5">
                            <label for="">What type of space do you have?</label>
                            <p><select class="form-select" aria-label="Default select example" name="type_of_space" >

                                {{-- @foreach ($all as $item)
                                 <option>{{ $item->v1 }}</option>
                                @endforeach --}}
             <option>Parking space</option>
             <option>Private storage</option>
             <option>Driver way</option>
                              </select></p>
                        </div>
                        </div>
                        <div class="tab">
                            <div class="step-number pb-4">
                                <i class="fa-solid fa-circle-check me-3"></i>
                                <h6 class="me-3 pt-1">Step 2</h6>
                                <i class="fa-solid fa-angle-right me-3 "></i>
                            </div>
                          <div class="mb-5">
                            <label for="">What type of vehicle do you have?</label>

                            <div class="vehicle-size">
                                <div class="radio-class"> <div class="form-check radio-check me-1">
                                  <input class="form-check-input" type="radio" value="1" name="flexRadioDisabled" id="flexRadioDisabled">
                                </div> <h5>Small Size</h5></div>
                                <div><img src="user/images/small.png"alt=""></div>
                              </div>
                              <div class="vehicle-size">
                                <div class="radio-class"> <div class="form-check radio-check me-1">
                                  <input class="form-check-input" type="radio" value="2" name="flexRadioDisabled" id="flexRadioDisabled" checked>
                                </div> <h5>Medium Size</h5></div>
                                <div><img src="user/images/medium.png"alt=""></div>
                              </div>
                              <div class="vehicle-size">
                                <div class="radio-class"> <div class="form-check radio-check me-1">
                                  <input class="form-check-input" type="radio" value="3" name="flexRadioDisabled" id="flexRadioDisabled">
                                </div> <h5>Large Size</h5></div>
                                <div><img src="user/images/large.png"alt=""></div>
                              </div>
                              <div class="vehicle-size">
                                <div class="radio-class"> <div class="form-check radio-check me-1">
                                  <input class="form-check-input" type="radio" value="4" name="flexRadioDisabled" id="flexRadioDisabled">
                                </div> <h5>Extra large Size</h5></div>
                                <div><img src="user/images/xl.png"alt=""></div>
                              </div>

                          </div>
                        </div>
                        <div class="tab">
                          <div class="step-number pb-4">
                            <i class="fa-solid fa-circle-check me-3"></i>
                            <h6 class="me-3 pt-1">Step 3</h6>
                            <i class="fa-solid fa-angle-right me-3 "></i>
                        </div>
                        <div class="mb-4 pb-2">
                          <label for="">Do you have an electric vehicle charger?</label>
                          <div class="select-btns pt-1">
                            <button type="button" class="me-3 d-flex"><div class="form-check radio-check me-1">
                              <input class="form-check-input" type="radio" value="0" name="flexRadioDisabled1" id="flexRadioDisabled" checked>
                            </div> Yes</button>
                            <button type="button" class="me-3 d-flex"><div class="form-check radio-check me-1">
                              <input class="form-check-input" type="radio" value="1" name="flexRadioDisabled1" id="flexRadioDisabled">
                            </div> No</button>
                          </div>
                        </div>
                        <div class="mb-5">
                          <label for="">Do you want to share your electric vehicle charger with
                            drivers?</label>
                            <div class="select-btns pt-1">
                                <button type="button" class="me-3 d-flex"><div class="form-check radio-check me-1">
                                  <input class="form-check-input" type="radio" value="0" name="flexRadioDisabled2" id="flexRadioDisabled1" checked>
                                </div> Yes</button>
                                <button type="button" class="me-3 d-flex"><div class="form-check radio-check me-1">
                                  <input class="form-check-input" type="radio" value="1" name="flexRadioDisabled2" id="flexRadioDisabled1">
                                </div> No</button>
                              </div>
                        </div>

                        </div>
                        <div class="tab">
                          <div class="step-number pb-4">
                            <i class="fa-solid fa-circle-check me-3"></i>
                            <h6 class="me-3 pt-1">Step 4</h6>
                            <i class="fa-solid fa-angle-right me-3 "></i>
                        </div>
                        <div class="mb-5 radio-check" >
                            <label for="">What type of booking do you want?</label>
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
                          </div>
                        </div>
                        <div class="tab">
                          <div class="step-number pb-4">
                              <i class="fa-solid fa-circle-check me-3"></i>
                              <h6 class="me-3 pt-1">Step 5</h6>
                              <i class="fa-solid fa-angle-right me-3 "></i>
                          </div>
                        <div class="mb-5">
                          <div class="mb-5">
                            <label for="">Select Your Country</label>
                            <p>
                                {{-- <select class="form-select" aria-label="Default select example" name="country" >
                               <option>United State</option>
                                @foreach($hello as $country)
                                <option {{(old('country') == $country->id) ? 'selected':''}} value="{{ $country->id }}">{{ $country->country_name }}</option>
                                @endforeach
                              </select> --}}

                              <label for="country">Country</label>
                              <select class="form-select" aria-label="Default select example" id="country" name="country" required>
                                  <option>United States</option>
                                @foreach($countries as $country)
                                <option {{ (old('country') == $country->id || $country->name == 'United state') ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                              </select>
                            </p>
                        </div>


                        <div class="mb-5">
                                <label for="state">State</label>
                                <select class="form-select" aria-label="Default select example" id="state" name="state" required>
                                </select>
                        </div>

                        <div class="mb-5">
                            <label for="state">City</label>
                            <p><input placeholder="Enter your city"  name="city" class="form-control" required maxlength="45"></p>
                    </div>

                          <label for="">Full Address</label>
                          <p><input placeholder="456 North Anderson Drive Aberdeen, AB16 7GL"  name="address" class="form-control" required maxlength="45"></p>
                        </div>
                        </div>
                      </div>


                      <div class="tab">
                        <div class="step-number pb-4">
                            <i class="fa-solid fa-circle-check me-3"></i>
                            <h6 class="me-3 pt-1">Step 6</h6>
                            <i class="fa-solid fa-angle-right me-3 "></i>
                        </div>
                      <div class="mb-5">
                        <div class="mb-5">
                          <label for="">Latitude</label>
                          <p><input type="number" placeholder=""  name="lat"  class="form-control" required maxlength="25"></p>
                      </div>
                        <label for="">Longitude</label>
                        <p><input type="number" placeholder=""  name="lng"  class="form-control" data-parsley-required="" required maxlength="25"></p>
                      </div>
                    </div>


                      <div class="tab">
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
                              <input type="number" name="hour" class="form-control"  placeholder="$ 1.30" required maxlength="7">
                            </div>
                          </div>
                          <div class="space-pricing">
                            <div class="d-flex">
                              <i class="bi bi-calendar-check me-3"></i>
                            <h6 class="pt-1">Daily</h6>
                            </div>
                            <div>
                              <input type="number" name="daily" class="form-control"  placeholder="$ 1.30" required maxlength="7">
                            </div>
                          </div>
                          <div class="space-pricing">
                            <div class="d-flex">
                              <i class="bi bi-calendar-check me-3"></i>
                            <h6 class="pt-1">Weekly</h6>
                            </div>
                            <div>
                              <input type="number" name="weekly" class="form-control"  placeholder="$ 1.30" required maxlength="7">
                            </div>
                          </div>
                          <div class="space-pricing">
                            <div class="d-flex">
                              <i class="bi bi-calendar-check me-3"></i>
                            <h6 class="pt-1">Monthly</h6>
                            </div>
                            <div>
                              <input type="number" name="monthly" class="form-control"  placeholder="$ 1.30" required maxlength="7">
                            </div>
                          </div>
                      </div>
                    </div>
                      <div class="tab">
                        <div class="step-number pb-4">
                            <i class="fa-solid fa-circle-check me-3"></i>
                            <h6 class="me-3 pt-1">Step 8</h6>
                            <i class="fa-solid fa-angle-right me-3 "></i>
                        </div>
                        <div class="mb-5">
                          <label for="">Add Photos</label> <br>
                          <small>Photos encourage trust and make your space stand out.</small>
                         <input type="file" name="image"  class="form-control" style="height: auto;" required>
                      </div>


                      {{-- <div class="mb-5">
                        <label for="">Write a description</label>
                        <textarea class="form-control" id="description" name="description" oninput="this.className = 'form-control'" rows="3" placeholder="1 space located on North Anderson Drive in Aberdeen. The space is big enough to fit large vehicles"  data-parsley-required="true" data-parsley-maxlength="400"  maxlength="400" minlength="250" required ></textarea>
                    </div> --}}
                    <div class="mb-5">
                        <label for="">Write a description</label>
                        <input type="textarea" class="form-control" id="description" name="description"  rows="3" placeholder="1 space located on North Anderson Drive in Aberdeen. The space is big enough to fit large vehicles" required  maxlength="200" minlength="30" required></input>
                        {{-- <p id="error-message">Textarea cannot be empty!</p> --}}
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
                    </div>


                        <div style="overflow:auto;">
                          <div class="pre-nex-btn">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                          </div>
                        </div>
                        <div style="text-align:center;margin-top:40px;">
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                        </div>

                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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


    @endsection()
