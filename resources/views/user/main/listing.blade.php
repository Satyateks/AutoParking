@extends('components.user.main')
@section('main-container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <style>
        #map {
            width: 100%;
            height: 600px;
        }

        .banner-search-box {
            background: transparent !important;
            box-shadow: none !important;
        }
    </style>

    <div class="container banner-search-box">
        <form class="row" id="searchform" action="{{ url('date_time_post') }}" method="POST">
            @csrf

            <div class="col-lg-2 col-6 form-check radio-column">
                <input type="radio" name="ev_able" value="0" id="ev_able_yes" checked>
                <label for="ev_able_yes">Charging Available</label>
            </div>
            <div class="col-lg-2 col-6 form-check radio-column ">

                <input type="radio" name="ev_able" value="1" id="ev_able_no">
                <label for="ev_able_no">Charging Not Available</label>
            </div>

            <div class="col-lg-8"></div>

            <div class="col-lg-4 mb-4 pt-4">
                {{-- <input type="text" class="form-control" id="exampleInputEmail1" name="location"
                    aria-describedby="emailHelp" placeholder="Search for a Parking Area"
                    value="{{ session('location') }}" />
                <div id="hintBox"></div>

                <span class="bx bx-search field-icon0"></span> --}}
                <input type="text" id="city" hidden name="city" value="{{Session('location')}}" />
                <input id="pac-input" class="controls form-control" value="{{Session('location')}}" required type="text" placeholder="Search Place">
            </div>

            <div class="col-lg-3 mb-4">
                <label for="start_date">Start Date</label>
                <input type="datetime-local" class="form-control" {{-- id="start_date" --}} name="start_date"
                    aria-describedby="emailHelp" placeholder="Select Start Date" {{-- min="{{ now()->toDateString() }}" --}}
                    onkeyup="updateURL('start_date')" value="{{ Session('start') }}" />
            </div>

            <div class="col-lg-3 mb-4">
                <label for="end_date">End Date</label>
                <input type="datetime-local" class="form-control" {{-- id="end_date" --}} name="end_date"
                    aria-describedby="emailHelp" placeholder="Select End Date" {{-- min="{{ now()->toDateString() }}" --}}
                    value="{{ Session('end') }}" onchange="document.getElementById('searchform').submit();" {{-- onkeyup="updateURL('end_date')" --}} />
            </div>

            {{-- <div class="col-lg-2 mb-4 mt-4">
                <button type="submit">Search</button>
            </div> --}}

            {{-- <script>
                function updateURL(inputType) {
                    var inputValue = document.getElementById(inputType).value;

                    // Construct the URL with the date and time parameter
                    var url = '/date_time_post?datetime=' + encodeURIComponent(inputValue);

                    // Update the browser URL without reloading the page
                    window.history.replaceState(null, null, url);
                }
            </script> --}}


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
                    twoHoursLater.setHours(twoHoursLater.getHours() + 2);
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

        </form>
    </div>

    <div class="container pt-4">
        <div class="row">
        </div>
    </div>

    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-lg-5 listing-column">

                @if(count($data) > 0)
                @foreach ($data as $item)
                    {{-- <div class="row space-list" onclick="location.href = '{{ url('space_details',$item->id) }}';"> --}}
                    <div class="row space-list" onclick="location.href = '{{ url('reserve-parking/' . $item->id) }}';">
                        <div class="col-lg-5 space-img">
                            <img src="{{ asset('images_uploade/' . $item->image) }}" alt="" width="180px"
                                height="100px">
                        </div>
                        <div class="col-lg-7 space-detail">
                            <h6>{{ $item->address }}</h6>
                            <div class="d-flex listing-star-icon">
                                @for ($i = 0; $i < $item->final_rating; $i++)
                                    <i class="bi bi-star-fill"></i>
                                @endfor
                                <span>&nbsp; ({{ $item->final_rating }})</span>
                                <h5>
                                    &nbsp;
                                    <img src="{{ asset('user/images/park-icon.png') }}" width="15" height="15"
                                        alt="" />
                                    &nbsp; Limited Space Left
                                </h5>
                            </div>
                            <h5>
                                <img src="{{ asset('images_uploade/' . $item->image) }}" width="30" height="30"
                                    alt="" />

                                @if (Session('ev_able') == '1')
                                    &nbsp; Ev Charger Available
                                @elseif(Session('ev_able') == '0')
                                    &nbsp; Not Ev Charger Available
                                @endif


                            </h5>
                            @if (Auth::user())
                                @if (Session('hour') > 24 && Session('hour') < 24 * 7)
                                    <button type="button" class="booking-btn mt-2">
                                        Book Now for ${{ $item->daily * Session('days') }}
                                    </button>
                                @elseif(Session('hour') <= 24)
                                    <button type="button" class="booking-btn mt-2">
                                        Book Now for ${{ $item->hourly * Session('hour') }}
                                    </button>
                                @elseif(Session('hour') >= 24 * 7 && Session('hour') < 24 * 30)
                                    <button type="button" class="booking-btn mt-2">
                                        Book Now for ${{ $item->weekly * Session('weeks') }}
                                    </button>
                                @elseif(Session('hour') >= 24 * 30)
                                    <button type="button" class="booking-btn mt-2">
                                        Book Now for ${{ $item->monthly * Session('months') }}
                                    </button>
                                @endif
                            @else
                                @if (Session('hour') > 24 && Session('hour') < 24 * 7)
                                    <button type="button" onclick="location.href = '{{ url('user_login') }}';"
                                        class="booking-btn mt-2">
                                        Book Now for ${{ $item->daily * Session('days') }}
                                    </button>
                                @elseif(Session('hour') <= 24)
                                    <button type="button" onclick="location.href = '{{ url('user_login') }}';"
                                        class="booking-btn mt-2">
                                        Book Now for ${{ $item->hourly * Session('hour') }}
                                    </button>
                                @elseif(Session('hour') >= 24 * 7 && Session('hour') < 24 * 30)
                                    <button type="button" onclick="location.href = '{{ url('user_login') }}';"
                                        class="booking-btn mt-2">
                                        Book Now for ${{ $item->weekly * Session('weeks') }}
                                    </button>
                                @elseif(Session('hour') >= 24 * 30)
                                    <button type="button" onclick="location.href = '{{ url('user_login') }}';"
                                        class="booking-btn mt-2">
                                        Book Now for ${{ $item->monthly * Session('months') }}
                                    </button>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
                @else
                <p>No Parking Slots Available for this location. Please search other.</p>
                @endif
            </div>
            </form>
            <div class="col-lg-7">
                <div class="listing-map">
                    <div id="map"></div>
                </div>
            </div>


        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script type="text/javascript">
        function initMap() {
            const myLatLng = { lat: 38.868226151, lng: -102.227783203 };

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 5,
                center: myLatLng,
            });
            
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);

            searchBox.addListener('places_changed', function() {
              $("#searchbtn").attr('disabled','disabled');
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
  
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
  
                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                // map.fitBounds(bounds);
                // marker.setPosition(bounds.getCenter()); // Set marker position to the center of the bounds
                getLocationInfo(bounds.getCenter().lat(), bounds.getCenter().lng());
            });
            
            function getLocationInfo( lati, longi) {
              
              var latitude = lati;
                var longitude = longi;
                $.ajax({
                      url: "{{ route('getLocation') }}",
                      method: 'GET',
                      data: {
                          'latitude': latitude,
                          'longitude': longitude,
                      },
                      cache: false,
                      success: function(data) {
                          console.log('map data : ', data);
                          var locationInfoDiv = document.getElementById('locationInfo');
                          $("#city").val(data.city);
                          
                          $("#searchbtn").removeAttr('disabled');
                          $("#searchform").submit();
                      }
                  });
                // Implement logic to fetch location details using latitude and longitude
                // Example: You can use external APIs like Google Maps Geocoding API
            }

            var locations = {!! json_encode($locations) !!};
           // var locations = {!! json_encode($data) !!};

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            console.log("parking List test api.....");
            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map

                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                        // Navigate to space_details when marker is clicked
                        window.location.href = 'reserve-parking/' + locations[i][3];
                        // window.location.href = 'reserve-parking/' + 163 ;


                    }
                })(marker, i));
            }
        }
        
    </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEFV2UwzAK7fN6CoMHc0uK8TnEZCq7B7w&libraries=places&callback=initMap" async defer></script>
{{-- js map work Multiple --}}

    <script src="https://js.stripe.com/v3/"></script>
    {{-- <script src="https://stripe.com/docs/payments"></script> --}}
    <script type="text/javascript">
        var stripe = Stripe('{{ env('STRIPE_KEY') }}')
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        function createToken() {
            document.getElementById("pay-btn").disabled = true;
            stripe.createToken(cardElement).then(function(result) {
                if (typeof result.error != 'undefined') {
                    document.getElementById("pay-btn").disabled = false;
                    alert(result.error.message);
                }
                /* creating token success */
                if (typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    document.getElementById('checkout-form').submit();
                }
            });
        }
    </script>
@endsection()
