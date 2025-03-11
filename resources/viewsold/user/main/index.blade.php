@extends('components.user.main')
@section('main-container')
<!-- Include Bootstrap CSS for styling (you may need to adjust the path) -->

<script src="{{asset('admin/parsley/parsley.min.js')}}"></script>
    <div class="container-fluid banner-container">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="banner-content">
              {{-- <h5>We Have the Best Deals for parking lots!</h5>
              <h6>Instantly book your space today. Trusted by millions</h6> --}}
              <h5>  {!! $t4->text ?? '' !!} </h5>
            </div>
            <div class="banner-search-box">
              <form class="row" action="{{ url('date_time_post') }}" method="POST" >
                @csrf
                 
                  <div class="col-lg-5 col-6 form-check radio-column">
                    <input type="radio" name="ev_able" value="0" id="ev_able_yes" checked>
                    <label for="ev_able_yes">Charging Available</label>
                  </div>
                  <div class="col-lg-4 col-6 form-check radio-column">
                    <input type="radio" name="ev_able" value="1" id="ev_able_no">
                    <label for="ev_able_no">Charging Not Available</label>
                </div>

                <div class="col-12 mb-4 pt-4">
                  <input
                    type="text"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    required data-parsley-whitespace="squish"
                    class="form-control"
                    id="exampleInputEmail1"
                    name="location"
                    aria-describedby="emailHelp"
                    placeholder="Search for a parking area"
                    value="{{ session('location') }}"
                    required
                  />
                  <div id="hintBox"></div>

                  <span class="bx bx-search field-icon0"></span>
                </div>
                   <script>
                    $(document).ready(function () {
                      // Bind the keyup event to the searchParkingArea function
                      $('#exampleInputEmail1').on('keyup', function () {
                        var keyword = $(this).val();
                        searchParkingArea(keyword);
                      });
                    });
                    function searchParkingArea(keyword) {
    var evAbleValue = $("input[name='ev_able']:checked").val();
    $.ajax({
        url: "{{ url('parking-spaces/search') }}", // Laravel route
        method: 'GET',
        data: { keyword: keyword, ev_able: evAbleValue },
        success: function (response) {
            // Filter results based on address and ev_able
            var filteredResults = response.filter(function (item) {
                return item.address.toLowerCase().includes(keyword.toLowerCase()) && item.ev_able == evAbleValue;
            });
            // Display filtered results
            displayHint(filteredResults);
        },
        error: function (error) {
            console.error('Error fetching parking areas:', error);
        }
    });
}




function displayHint(data) {
    var hintBox = $('#hintBox');
    hintBox.empty();

    if (data.length > 0) {
        var hintList = $('<ul class="list-group"></ul>');

        data.forEach(function (item) {
            var listItem = $('<li class="list-group-item">' + item.address + '</li>');

            // Add click event handler to populate search box
            listItem.click(function () {
                $('#exampleInputEmail1').val(item.address);
                hintBox.empty(); // Clear hints after selecting one
            });

            hintList.append(listItem);
        });

        hintBox.append(hintList);
    } else {
        hintBox.append('<p>No matching parking areas found.</p>');
    }
}
</script>

                {{-- <h5>Start</h5>
          <div class="col-6 mb-4">
                  <input
                    type="date"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Search for a Parking Area"
                  />
                </div>

                <div class="col-6 mb-4">
                  <input
                    type="time"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Search for a Parking Area"
                  />
                </div>
                <h5>End</h5>
                <div class="col-6 mb-4">
                    <input
                      type="date"
                      class="form-control"
                      id="exampleInputEmail1"
                      aria-describedby="emailHelp"
                      placeholder="Search for a Parking Area"
                    />
                  </div>
                  <div class="col-6 mb-4">
                    <input
                      type="time"
                      class="form-control"
                      id="exampleInputEmail1"
                      aria-describedby="emailHelp"
                      placeholder="Search for a Parking Area"
                    />
                  </div> --}}


                  {{-- <div class="col-6 mb-4">
                    <label for="start_date">Start Date</label>
                    <input
                    type="datetime-local"
                        class="form-control"
                        id="start_date"
                        name="start_date"

                        placeholder="Select Start Date"
                        min="{{ now()->toDateString() }}"
                        required
                    />
                </div>


                <!-- End Date and Time -->
                <div class="col-6 mb-4">
                    <label for="end_date">End Date</label>
                    <input
                    type="datetime-local"
                        class="form-control"
                        id="end_date"
                        name="end_date"
                        placeholder="Select End Date"
                        min="{{ now()->toDateString() }}"
                        required
                    />
                </div> --}}

                @php
                    use Carbon\Carbon;
                @endphp

                <div class="col-6 mb-4">
                    <label for="start_date">Start Date</label>
                    <input
                        type="datetime-local"
                        class="form-control"
                        id="start_date"
                        name="start_date"
                        placeholder="Select Start Date"
                        min="{{ now()->toDateString() }}"
                        required
                    />
                </div>

                <div class="col-6 mb-4">
                    <label for="end_date">End Date</label>
                    <input
                        type="datetime-local"
                        class="form-control"
                        id="end_date"
                        name="end_date"
                        placeholder="Select End Date"
                        min="{{ now()->toDateString() }}"
                        required
                    />
                </div>

                <script>
                    // Get references to start and end date input elements
                    var startDateInput = document.getElementById('start_date');
                    var endDateInput = document.getElementById('end_date');

                    // Add event listener to start date input to validate against end date
                    startDateInput.addEventListener('change', function() {
                        if (startDateInput.value > endDateInput.value) {
                            alert('Start date cannot be after end date');
                            startDateInput.value = endDateInput.value;
                        }
                    });

                    // Add event listener to end date input to validate against start date
                    endDateInput.addEventListener('change', function() {
                        if (endDateInput.value < startDateInput.value) {
                            alert('End date cannot be before start date');
                            endDateInput.value = startDateInput.value;
                        }
                    });
                </script>




                <!-- Add this script section to your HTML file -->


                <script>
function getCurrentDateTimeInDelhi() {
        var now = new Date();
        var offsetInMilliseconds = 5.5 * 60 * 60 * 1000;
        var delhiTime = new Date(now.getTime() + offsetInMilliseconds);
        return delhiTime.toISOString().slice(0, 16);
    }
    var currentDateTime = getCurrentDateTimeInDelhi();
    document.getElementById('start_date').value = currentDateTime;

     function getCurrentDateTimeInDelhi() {
        var now = new Date();
        var offsetInMilliseconds = 5.5 * 60 * 60 * 1000;
        var delhiTime = new Date(now.getTime() + offsetInMilliseconds);
        return delhiTime.toISOString().slice(0, 16);
    }

    function getTwoHoursLaterInDelhi() {
        var twoHoursLater = new Date();
        twoHoursLater.setHours(twoHoursLater.getHours() + 1);
        var offsetInMilliseconds = 5.5 * 60 * 60 * 1000;
        var delhiTime = new Date(twoHoursLater.getTime() + offsetInMilliseconds);
        return delhiTime.toISOString().slice(0, 16);
    }
    var currentDateTime = getCurrentDateTimeInDelhi();
    document.getElementById('start_date').value = currentDateTime;
    var twoHoursLaterDateTime = getTwoHoursLaterInDelhi();
    document.getElementById('end_date').value = twoHoursLaterDateTime;
    document.getElementById('start_date').min = currentDateTime;
    document.getElementById('end_date').min = twoHoursLaterDateTime;

                </script>




                <button type="submit" onclick="location.href = '{{ url('listing') }}';">Search</button>

              </form>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="banner-img-column">

              <img src="{{ asset('images_uploade/'.$m0->image) }}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--- section info-box --->

    <div class="container pt-5 mb-4">
      <div class="row" style="justify-content: center">
        <div class="col-lg-11">
          <div class="row">
            <div class="col-lg-4">
              <div class="info-column">
                <div>
                  <img src="{{ asset('images_uploade/'.$i1->image) }}" width="40px" height="40px" alt="" />
                </div>
                <div>
                  {{-- <h5>Save Money</h5>
                  <h6>
                    Save up to 70% on our site <br />
                    compared to the cost of on-airport <br />
                    parking.
                  </h6> --}}
                  {!! $t1->text ?? '' !!}
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="info-column">
                <div>
                    <img src="{{ asset('images_uploade/'.$i2->image) }}" width="40px" height="40px" alt="" />
                </div>
                <div>
                  {{-- <h5>Save Time</h5>
                  <h6>
                    It’s easy to compare parking at all <br />
                    major airports. Booking a reservation <br />
                    is quick & simple!
                  </h6> --}}
                  {!! $t2->text ?? '' !!}
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="info-column">
                <div>
                    <img src="{{ asset('images_uploade/'.$i3->image) }}" width="40px" height="40px" alt="" />
                </div>
                <div>
                  {{-- <h5>Save Stress</h5>
                  <h6>
                    Guarantee your parking spot by <br />
                    booking in advance. Can’t make it? <br />
                    Cancellations are free.
                  </h6> --}}
                  {!! $t3->text ?? '' !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--- about us --->
    <div class="container pt-4 mb-5">
      <div class="row" style="align-items: center">
        <div class="col-lg-6">
          <div class="about-image">
            <img src="{{ asset('images_uploade/'.$m1->image) }}" width="500px" height="450px" alt="" />
          </div>
        </div>
        <div class="col-lg-6">
          <div class="about-content">
            {{-- <h6>About Us</h6>
            <h5>Welcome to one Auto Park</h5>
            <p>
              One Auto Park offers a comprehensive solution for parking needs,
              including EV charging availability and an eco-friendly approach.
            </p>
            <p>
              Our all-in-one service is designed to provide convenience and
              sustainability to our customers. With our state-of-the-art
              facilities, you can rest assured that your vehicle is in good
              hands while you go about your day. Thank you for considering One
              Auto Park for your parking needs.
            </p>
            <p>
              Please bear with us while we develop our website to give you the
              best experience in parking solutions. <br />If you have a parking
              space that you would like to rent out, please drop us an email
              with your details and location:
            </p>
            <p>
              <a href="mailto:praking@oneautogo.com"> praking@oneautogo.com </a>
              or call us on <a href="tel:07778858278">07778858278</a> (what’s
              up)
            </p> --}}
            <h2>{!! $t5->text ?? '' !!}</h2>

          </div>
        </div>
      </div>
    </div>

    <!--- why choose us --->
    <div class="container-fluid whyus-container pt-5 pb-5">
      <div class="container">
        <div class="row" style="justify-content: center">
          <div class="col-lg-11">
            <div class="why-us-section">
              {{-- <h4>Why Choose Auto Park</h4>
              <h6>
                We are the Best providers of Auto parking <br />
                You can't park closer!
              </h6> --}}

              {!! $t6->text ?? '' !!}

              <div class="why-img">
                <img src="{{asset('images_uploade/'.$m3->image)  }}" width="1000px" height="400px" alt="" />
              </div>
              <img src="images/play.png" class="play-img"  alt="" />
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="why-us-info">
                  <div class="me-4">
                    <img id="blah" src="{{ asset('images_uploaded/'.$data1->image) ?? ''}}" width="40" height="40" alt="your image" class="mt-3">
                </div>
                  <div>

                    {!! $data5->text ?? '' !!}
                    {{-- <h5>Ev Charging</h5>
                    <h6>
                      Save up to 70% on our site compared to the cost of
                      on-airport parking.
                    </h6> --}}
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="why-us-info">
                  <div class="me-4">
                    <img id="blah" src="{{ asset('images_uploaded/'.$data2->image) ?? ''}}" width="40" height="40" alt="your image" class="mt-3">
                </div>
                  <div>

                    <h5> </h5>

                    {{-- <h5>Eco-Friendly</h5>
                    <h6>
                      Save up to 70% on our site compared to the cost of
                      on-airport parking.
                    </h6> --}}
                    <h6>{!! $data6->text ?? '' !!}</h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="why-us-info">
                  <div class="me-4">
                    <img id="blah" src="{{ asset('images_uploaded/'.$data3->image) ?? ''}}" width="40" height="40" alt="your image" class="mt-3">
                </div>
                  <div>
                    {!! $data7->text ?? '' !!}
                    {{-- <h5>Safe And Secure</h5>
                    <h6>
                      Save up to 70% on our site compared to the cost of
                      on-airport parking.
                    </h6> --}}
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="why-us-info">
                  <div class="me-4">
                    <img id="blah" src="{{ asset('images_uploaded/'.$data4->image) ?? ''}}" width="40" height="40" alt="your image" class="mt-3">
                </div>
                  <div>
                    {!! $data8->text ?? '' !!}
                    {{-- <h5>Safe And Secure</h5>
                    <h6>
                      Save up to 70% on our site compared to the cost of
                      on-airport parking.
                    </h6> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container pt-4 mb-2">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="why-us-section">
            <h4>Storage Companies</h4>
          </div>

          <section class="customer-logos slider pt-5">
            @foreach ($storage as $item)
            <div class="slide"><img src="{{ asset('images_uploaded/'.$item->photo) }}" /></div>
            {{-- <div class="slide"><img src="{{ asset('user/images/comp1.png') }}"></div>
            <div class="slide"><img src="{{ asset('user/images/comp2.png') }}"></div>
            <div class="slide"><img src="{{ asset('user/images/comp3.png') }}"></div>
            <div class="slide"><img src="{{ asset('user/images/comp4.png') }}"></div>
            <div class="slide"><img src="{{ asset('user/images/comp.png') }}"></div>
            <div class="slide"><img src="{{ asset('user/images/comp1.png') }}"></div>
            <div class="slide"><img src="{{ asset('user/images/comp2.png') }}"></div>
            <div class="slide"><img src="{{ asset('user/images/comp3.png') }}"></div>
            <div class="slide"><img src="{{ asset('user/images/comp4.png') }}"></div>
            <div class="slide"><img src="{{ asset('user/images/comp.png') }}"></div>
            <div class="slide"><img src="{{ asset('user/images/comp1.png') }}"></div>
            <div class="slide"><img src="{{ asset('user/images/comp2.png') }}"></div> --}}
          @endforeach
        </section>


        </div>
      </div>
    </div>

    <div class="container pt-5 pb-5">
      <div class="row" style="align-items: center">
        <div class="col-lg-6">
          <div class="solution-content">

             <div class="sub-head-solution mt-5">

            </div>
            <div class="sub-head-solution">

            </div>
            <div class="sub-head-solution">


            </div>
            <div class="sub-head-solution">
                {!! $t7->text ?? '' !!}
                {{-- <h5>Our solution Of car parking services</h5> --}}
            <div class="sub-head-solution mt-5">
              {{-- <h6>Global Supply Image</h6>
              <p>
                One Auto Park offers a comprehensive solution for parking needs,
                including EV charging availability and an eco-friendly approach.
              </p> --}}
            </div>
            <div class="sub-head-solution">
              {{-- <h6>Global Supply Image</h6>
              <p>
                One Auto Park offers a comprehensive solution for parking needs,
                including EV charging availability and an eco-friendly approach.
              </p> --}}
            </div>
            <div class="sub-head-solution">
              {{-- <h6>Global Supply Image</h6>
              <p>
                One Auto Park offers a comprehensive solution for parking needs,
                including EV charging availability and an eco-friendly approach.
              </p> --}}
            </div>

            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="solution-img">
            <img src="{{ asset('images_uploade/'.$m2->image) }}" width="400px" height="450px"  alt="" />
          </div>
        </div>
      </div>
    </div>

    <!--- testimonials --->
    <div class="container pt-4 pb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="why-us-section">
            {!! $t8->text ?? '' !!}
            {{-- <h4>
              What our <br />
              Customers Say
            </h4>
            <h6>
              We are the best providers of auto parking <br />
              You can't park closer!
            </h6> --}}
          </div>
          <div class="owl-carousel owl-theme">
            {{-- <div class="item">
              <div class="testimonal mb-3">
                <div>
                  <img src="user/images/test.png" alt="" />
                </div>
                <div>
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i
                  ><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i
                  ><i class="bi bi-star-fill"></i>
                </div>
              </div>
              <p>
                One Auto Park offers a comprehensive solution for parking needs,
                including EV charging availability and an eco-friendly approach.
              </p>
              <h6><b>Stephen Brekke</b> / Legacy Integration Producer</h6>
            </div>
            <div class="item">
              <div class="testimonal mb-3">
                <div>
                  <img src="user/images/test.png" alt="" />
                </div>
                <div>
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i
                  ><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i
                  ><i class="bi bi-star-fill"></i>
                </div>
              </div>
              <p>
                One Auto Park offers a comprehensive solution for parking needs,
                including EV charging availability and an eco-friendly approach.
              </p>
              <h6><b>Stephen Brekke</b> / Legacy Integration Producer</h6>
            </div>

            <div class="item">
              <div class="testimonal mb-3">
                <div>
                  <img src="user/images/test.png" alt="" />
                </div>
                <div>
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i
                  ><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i
                  ><i class="bi bi-star-fill"></i>
                </div>
              </div>
              <p>
                One Auto Park offers a comprehensive solution for parking needs,
                including EV charging availability and an eco-friendly approach.
              </p>
              <h6><b>Stephen Brekke</b> / Legacy Integration Producer</h6>
            </div> --}}
            @foreach ($testimonial as $item)
            <div class="item">
              <div class="testimonal mb-3">
                <div>
                  <img src="{{ asset('images_uploaded/'.$item->photo) }}" alt="" />
                </div>
                <div>
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i
                  ><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i
                  ><i class="bi bi-star-fill"></i>
                </div>
              </div>
              <p>
                {{ $item->comment }}
                {{-- One Auto Park offers a comprehensive solution for parking needs,
                including EV charging availability and an eco-friendly approach. --}}
              </p>
              <h6>
                <b>{{ $item->name }}</b> {{ $item->	des }}
            </h6>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid end-container">
        <div class="row" style="justify-content: center">
          <div class="col-lg-6 mt-5 pt-5">
            <div class="end-section">
                <h4>
                    {!! $t150->text ?? '' !!}
                </h4>
              {{-- <h4>Your all-in-one Parking slot.</h4>
              <p>
                Our all-in-one service is designed to provide convenience and
                sustainability to our customers. With our state-of-the-art
                facilities, you can rest assured that your vehicle is in good
                hands while you go about your day. Thank you for considering One
                Auto Park for your parking needs.
              </p> --}}

              <figure class="tabBlock">
                <ul class="tabBlock-tabs">
                  <li class="tabBlock-tab is-active">Mobile</li>
                  <li class="tabBlock-tab">Email</li>
                </ul>
                <div class="tabBlock-content">
                  <div class="tabBlock-pane col-8 pt-3">
                    <p>Enter your phone number to receive a text with a link to download the app.</p>
                    <form action="{{ url('submitForm') }}" method="POST">
                    @csrf
                    <input
                    type="number"
                    class="form-control"

                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Enter your phone number"
                    name="phoneInput"
                  />
                  <button class="field-btn-icon me-2">Submit</button>
                  </div>
                  <div class="tabBlock-pane col-8 pt-3">
                    <p>Enter your email id to receive a text with a link to download the app.</p>
                    <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    name="emailInput"
                    aria-describedby="emailHelp"
                    placeholder="Enter your email id"
                  />
                  <button class="field-btn-icon me-2">Submit</button>
                </form>
                  </div>
                </div>
              </figure>
            </div>
          </div>
        </div>
      </div>






    @endsection()
