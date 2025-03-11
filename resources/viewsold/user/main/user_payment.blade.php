@extends('components.user.main')
@section('main-container')
<style>
  #map {
    width: 100%;
    height: 600px;
  }
</style>

<div class="container pt-4">
    <div class="row">






        <div class="col-lg-6 mb-4 pt-4">
            <input
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              name="location"
              aria-describedby="emailHelp"
              placeholder="Search for a Parking Area"
              {{-- value="{{ session('location') }}" --}}
              value="{{ $data->address }}"
            />
            <div id="hintBox"></div>

            <span class="bx bx-search field-icon0"></span>
          </div>


          <div class="col-lg-3 mb-4">
            <label for="start_date">Start Date</label>
            <input
                type="datetime-local"
                class="form-control"
                {{-- id="start_date" --}}
                name="start_date"
                aria-describedby="emailHelp"
                placeholder="Select Start Date"
                value="{{ Session('start') }}"
                {{-- min="{{ now()->toDateString() }}" --}}
                onkeyup="updateURL('start_date')"
            />
        </div>

        <div class="col-lg-3 mb-4">
            <label for="end_date">End Date</label>
            <input
                type="datetime-local"
                class="form-control"
                {{-- id="end_date" --}}
                name="end_date"
                aria-describedby="emailHelp"
                placeholder="Select End Date"
                {{-- min="{{ now()->toDateString() }}" --}}
                value="{{ Session('end') }}"
                onkeyup="updateURL('end_date')"
            />
        </div>


        <script>
            function updateURL(inputType) {
                // Get the input element value
                var inputValue = document.getElementById(inputType).value;

                // Construct the URL with the date and time parameter
                var url = '/date_time_post?datetime=' + encodeURIComponent(inputValue);

                // Update the browser URL without reloading the page
                window.history.replaceState(null, null, url);
            }
        </script>


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


          <div class="container pt-5 pb-5">
            <div class="row">

      <div class="col-lg-4 listing-column">
          <div class="vehicle-number-box">
            <form class="row" action="{{ route('vahicle_number_add111') }}" method="POST" data-parsley-validate>
                @csrf
                <h6 class="mb-3"><b>Add Vehicle Number</b></h6>
                <div class="mb-3 col-lg-8">
                    <input type="text" name="vehicle" value="{{ Auth::user()->vehicle ?? '' }}" class="form-control" required pattern="[A-Za-z0-9]{1,16}" data-parsley-length="[8,15]" maxlength="15" minlength="8">
                    <p class="text-danger" id="vehicle-error-message"></p>
                </div>
                <div class="mb-3 col-lg-4">
                    <button type="submit">ADD</button>
                </div>
            </form>

          </div>
          <div class="vehicle-number-box mt-3">
              <form class="row">
                  <h6 class="mb-3"><b>Booking Details</b></h6>
                  <hr>
                  <div class="mb-3 col-lg-3">
                      <h5>Arriving on</h5>
                  </div>
                  <div class="col-lg-4"></div>
                  <div class="mb-3 col-lg-5">
                    <h4><b>Start Time: {{ Session('start') }} </b></h4>

                  </div>
              </form>
              <form class="row">
                  <div class="mb-3 col-lg-3">
                      <h5>Leaving on</h5>
                  </div>
                  <div class="col-lg-4"></div>
                  <div class="mb-3 col-lg-5">

                    <h4><b>End Time: {{ Session('end') }}</b></h4>

                  </div>
              </form>
              <form class="row">
                  <div class="mb-3 col-lg-3">
                      <h5>Duration</h5>
                  </div>
                  <div class="col-lg-4"></div>
                  <div class="mb-3 col-lg-5">
                    @php
    // Convert the time strings to DateTime objects for easy calculation
    $startTime = \Carbon\Carbon::parse(session('start_date'));
    $endTime = \Carbon\Carbon::parse(session('end_date'));

    // Calculate the difference in minutes
    $timeDifference = $endTime->diffInMinutes($startTime);

    // Calculate hours and minutes from total time difference
    $hours = floor($timeDifference / 60);
    $minutes = $timeDifference % 60;
@endphp
<h4>  <b>{{ Session('hour') }} hours </b></h4>
                  </div>
              </form>
          </div>
          <div class="vehicle-number-box mt-3">
       <div class="payment-detail mb-4">
          {{-- <h6><b>{{ (session('location')) }}</b></h6> --}}
          <h6><b>{{ $data->address }}</b></h6>

          <div class="d-flex">
            {{-- <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i
            ><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i
            ><i class="bi bi-star-fill"></i> &nbsp; --}}
            @for ($i = 0; $i < $data->final_rating; $i++)
            <b><i class="bi bi-star-fill"></i></b>
            @endfor
            <b>({{$data->final_rating}})</b>
            {{-- <h5>
              &nbsp; (4.6)
            </h5> --}}
          </div>
       </div>
       <div class="total-price-detail">
          <div class="mb-3">
              <h5>Parking Fee</h5>
          </div>
          <div class="mb-3">
              {{-- <h4>$.{{ session('price')*$data->daily }}</h4> --}}
              @if(Session('hour') > 24)
    <h4 >
        <b> ${{$data->daily * Session('hour')}}</b>
    </h4>
@elseif(Session('hour') < 24)
    <h4 >
        <b> ${{$data->hourly * Session('hour')}}</b>
    </h4>
@elseif(Session('hour') >= 24 && Session('hour') < 24 * 7)
    <h4 >
        <b>  ${{$data->weekly * Session('hour')}}</b>
    </h4>
@elseif(Session('hour') >= 24 * 7 && Session('hour') < 24 * 30)
    <h4 >
        <b> ${{$data->monthly * Session('hour')}}</b>
    </h4>
@endif

          </div>
      </div>


      <div class="total-price-detail">
          <div class="mb-3">
              <h5>Tax</h5>
          </div>
          <div class="mb-3">
            @if(Session('hour') > 24)
    <h4>
        <b> ${{ number_format($data->daily * Session('hour') * 1.18-$data->daily * Session('hour'), 2) }}</b>
    </h4>
@elseif(Session('hour') < 24)
    <h4>
        <b>${{ number_format($data->hourly * Session('hour') * 1.18-$data->hourly * Session('hour'), 2) }}</b>
    </h4>
@elseif(Session('hour') >= 24 && Session('hour') < 24 * 7)
    <h4>
        <b>${{ number_format($data->weekly * Session('hour') * 1.18-$data->weekly * Session('hour'), 2) }}</b>
    </h4>
@elseif(Session('hour') >= 24 * 7 && Session('hour') < 24 * 30)
    <h4>
        <b>${{ number_format($data->monthly * Session('hour') * 1.18-$data->monthly * Session('hour') , 2) }}</b>
    </h4>
@endif

          </div>
      </div>



    {{-- <div class="total-price-detail">
        <div class="mb-3">
            <h5>Tax</h5>
        </div>
        <div class="mb-3">
            <h4>$ 1.30</h4>
        </div>
    </div> --}}
    <div class="total-price-detail">
        <div class="mb-3">
            <h5>Transaction {{$commission->commission ?? '0'}}%</h5>
        </div>
        <div class="mb-3">
            @if(Session('hour') > 24)
    <h4>
       <b> ${{ number_format(($data->daily * Session('hour')) * 1.10-$data->daily * Session('hour'), 2) }}</b>
    </h4>
@elseif(Session('hour') < 24)
    <h4>
       <b>${{ number_format(($data->hourly * Session('hour')) * 1.10-$data->hourly * Session('hour'), 2) }}</b>
    </h4>
@elseif(Session('hour') >= 24 && Session('hour') < 24 * 7)
    <h4>
      <b>  ${{ number_format(($data->weekly * Session('hour')) * 1.10-$data->weekly * Session('hour'), 2) }}</b>
    </h4>
@elseif(Session('hour') >= 24 * 7 && Session('hour') < 24 * 30)
    <h4>
       <b> ${{ number_format(($data->monthly * Session('hour')) * 1.10-$data->monthly * Session('hour'), 2) }}</b>
    </h4>
@endif

        </div>
    </div>
    <hr>

    <div class="total-price-detail">
        <div class="">
            <h5> Total Parking Fee</h5>
        </div>
        @if(Session('hour') > 24)
        <h4>
          <b> ${{ number_format(($data->daily * Session('hour')) * 1.25, 2) }}</b>
        </h4>
    @elseif(Session('hour') < 24)
        <h4>
         <b>   ${{ number_format(($data->hourly * Session('hour')) * 1.25, 2) }}</b>
        </h4>
    @elseif(Session('hour') >= 24 && Session('hour') < 24 * 7)
        <h4>
          <b>  ${{ number_format(($data->weekly * Session('hour')) * 1.25, 2) }}</b>
        </h4>
    @elseif(Session('hour') >= 24 * 7 && Session('hour') < 24 * 30)
        <h4>
           <b> ${{ number_format(($data->monthly * Session('hour')) * 1.25, 2) }}</b>
        </h4>
    @endif

        {{-- <div class="">
            <h4>$.</h4>
        </div> --}}
</div>
      <hr>
          </div>




@php
    $price = 0;
    if(Session('hour') > 24) {
        $price = $data->daily * Session('hour');
    } elseif(Session('hour') < 24) {
        $price = $data->hourly * Session('hour');
    } elseif(Session('hour') >= 24 && Session('hour') < 24 * 7) {
        $price = $data->weekly * Session('hour');
    } elseif(Session('hour') >= 24 * 7 && Session('hour') < 24 * 30) {
        $price = $data->monthly * Session('hour');
    }
    $commissionPercentage = $commission->commission ?? 0;
    $commissionAmount = ($commissionPercentage / 100) * $price;
@endphp




            <form id='checkout-form' method='post' action="{{ route('stripe.post') }}">
                @csrf
                <input type='hidden' name='stripeToken' id='stripe-token-id'>
                @if(Session('hour') > 24)
    <input type="hidden" name="price" value="{{ number_format(($data->daily * Session('hour')) * 1.25, 2) }}">
@elseif(Session('hour') < 24)
    <input type="hidden" name="price" value="{{ number_format(($data->hourly * Session('hour')) * 1.25, 2) }}">
@elseif(Session('hour') >= 24 && Session('hour') < 24 * 7)
    <input type="hidden" name="price" value="{{ number_format(($data->weekly * Session('hour')) * 1.25, 2) }}">
@elseif(Session('hour') >= 24 * 7 && Session('hour') < 24 * 30)
    <input type="hidden" name="price" value="{{ number_format(($data->monthly * Session('hour')) * 1.25, 2) }}">
@endif
                <input type='hidden' name='owner_id' value="{{$data->id}}">
                <input type='hidden' name='parking_id' value="{{$data->owner_id}}">
                <input type='hidden' name='start' value="{{ Session('start') }}">
                <input type='hidden' name='end' value="{{Session('end')}}">
                <input type="hidden" name="commision">
                <input type="hidden" name="commission" value="{{$commissionAmount}}">
                <input type="hidden" name="location" value="{{ $data->address }}">
                <br>
                <div id="card-element" class="form-control" ></div>

                @if(Session('hour') > 24)
    <button
        id='pay-btn'
        class="btn btn-success mt-3"
        type="button"
        style="margin-top: 20px; width: 100%;padding: 7px;"
        onclick="createToken()">
        PAY ${{ number_format(($data->daily * Session('hour')) * 1.25, 2) }}
    </button>
@elseif(Session('hour') < 24)
    <button
        id='pay-btn'
        class="btn btn-success mt-3"
        type="button"
        style="margin-top: 20px; width: 100%;padding: 7px;"
        onclick="createToken()">
        PAY ${{ number_format(($data->hourly * Session('hour')) * 1.25, 2) }}
    </button>
@elseif(Session('hour') >= 24 && Session('hour') < 24 * 7)
    <button
        id='pay-btn'
        class="btn btn-success mt-3"
        type="button"
        style="margin-top: 20px; width: 100%;padding: 7px;"
        onclick="createToken()">
        PAY ${{ number_format(($data->weekly * Session('hour')) * 1.25, 2) }}
    </button>
@elseif(Session('hour') >= 24 * 7 && Session('hour') < 24 * 30)
    <button
        id='pay-btn'
        class="btn btn-success mt-3"
        type="button"
        style="margin-top: 20px; width: 100%;padding: 7px;"
        onclick="createToken()">
        PAY ${{ number_format(($data->monthly * Session('hour')) * 1.25, 2) }}
    </button>
@endif

            <form>
      </div>
      <div class="col-lg-8">
        <div class="lisitng-map">

          <div id="map"></div>
        </div>
      </div>
    </div>
  </div>
  @php
      $locations = [
        [$data->address, $data->lat, $data->lng],
        ]
  @endphp

     {{-- map JavaScript Work --}}
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEFV2UwzAK7fN6CoMHc0uK8TnEZCq7B7w"></script>
  <script type="text/javascript">
    function initMap() {
      const myLatLng = { lat: 22.2734719, lng: 70.7512559 };

      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 5,
        center: myLatLng,
      });

      var locations = {!! json_encode($locations) !!};

      var infowindow = new google.maps.InfoWindow();

      var marker, i;

      for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][1], locations[i][2]),
          map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
          }
        })(marker, i));
      }
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEFV2UwzAK7fN6CoMHc0uK8TnEZCq7B7w&callback=initMap" async defer></script>
{{-- js map work Multiple --}}

<script src="https://js.stripe.com/v3/"></script>
{{-- <script src="https://stripe.com/docs/payments"></script> --}}
<script type="text/javascript">
    var stripe = Stripe('{{ env('STRIPE_KEY') }}')
    var elements = stripe.elements();
    var cardElement = elements.create('card', {
        hidePostalCode: true
    });
    cardElement.mount('#card-element');

    function createToken() {
        document.getElementById("pay-btn").disabled = true;
        stripe.createToken(cardElement).then(function(result) {
            if(typeof result.error != 'undefined') {
                document.getElementById("pay-btn").disabled = false;
                alert(result.error.message);
            }
            /* creating token success */
            if(typeof result.token != 'undefined') {
                document.getElementById("stripe-token-id").value = result.token.id;
                document.getElementById('checkout-form').submit();
            }
        });
    }
</script>


@endsection()
