@extends('components.user.main')
@section('main-container')
    <style>
        #map {
            width: 100%;
            height: 600px;
        }
    </style>

    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-lg-4 listing-column">
                <div class="detail-column">
                    <h6>{{ $data->address }}</h6>
                    <div class="d-flex listing-star-icon">
                        @for ($i = 0; $i < $data->final_rating; $i++)
                            <i class="bi bi-star-fill"></i>
                        @endfor
                        ({{ $data->final_rating }})
                        {{-- <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i
              ><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i
              ><i class="bi bi-star-fill"></i> &nbsp; --}}
                        <h5>
                            &nbsp;
                            <img src="{{ asset('images_uploade/' . $data->image) }}" width="15" height="15"
                                alt="" />
                            &nbsp; Limited Space Left
                        </h5>
                    </div>
                    <small>Private Car parking space available</small>
                    <div class="d-flex duration-box pt-4">
                        <div class="me-4">
                            <p>Total Duration</p>
                            <h4><b>
                                    @php
                                        echo Session('hour');
                                    @endphp
                                </b><b>
                                    Hours
                                </b>
                            </h4>
                        </div>
                        <div>
                            <p>Parking Fee</p>

                            @if (Session('hour') > 24 && Session('hour') < 24 * 7)
                                <h4>
                                    <b>
                                        {{ $data->daily * Session('days') }}$
                                    </b>
                                </h4>
                            @elseif(Session('hour') <= 24)
                                <h4>
                                    <b>
                                        {{ $data->hourly * Session('hour') }}$
                                    </b>
                                </h4>
                            @elseif(Session('hour') > 24 * 7 && Session('hour') < 24 * 30)
                                <h4>
                                    <b>
                                        {{ $data->weekly * Session('weeks') }}$
                                    </b>
                                </h4>
                            @elseif(Session('hour') >= 24 * 30)
                                <h4>
                                    <b>
                                        {{ $data->monthly * Session('months') }}$
                                    </b>
                                </h4>
                            @endif

                        </div>
                    </div>

                    <div class="space-detail-images pt-4">
                        <img src="images/detail-space.png" alt="" />
                        <div class="detail-sub-img pt-3">
                            <img src="images/small-details.png" alt="" />
                            <img src="images/small-details.png" alt="" />
                            <img src="images/small-details.png" alt="" />
                            <img src="images/small-details.png" alt="" />
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('images_uploade/' . $data->image) }}" width="100%" height="250px"
                            alt="" />

                    </div>
                    <div class="detail-content pt-4">
                        <h3>Parking Space Details</h3>
                        <p>
                            {{ $data->description }}
                        </p>


                        @if (Session('hour') > 24 && Session('hour') < 24 * 7)
                            <form action="{{ url('user_payment', $data->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="booking_cost" value="{{ $data->daily * Session('days') }}">
                                <button type="submit" class="booking-btn mt-2">
                                    Book Now for ${{ $data->daily * Session('days') }}
                                </button>
                            </form>
                        @elseif(Session('hour') <= 24)
                            <form action="{{ url('user_payment', $data->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="booking_cost" value="{{ $data->hourly * Session('hour') }}">
                                <button type="submit" class="booking-btn mt-2">
                                    Book Now for ${{ $data->hourly * Session('hour') }}
                                </button>
                            </form>
                        @elseif(Session('hour') >= 24 * 7 && Session('hour') < 24 * 30)
                            <form action="{{ url('user_payment', $data->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="booking_cost" value="{{ $data->weekly * Session('weeks') }}">
                                <button type="submit" class="booking-btn mt-2">
                                    Book Now for ${{ $data->weekly * Session('weeks') }}
                                </button>
                            </form>
                        @elseif(Session('hour') >= 24 * 30)
                            <form action="{{ url('user_payment', $data->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="booking_cost" value="{{ $data->monthly * Session('months') }}">
                                <button type="submit" class="booking-btn mt-2">
                                    Book Now for ${{ $data->monthly * Session('months') }}
                                </button>
                            </form>
                        @endif


                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-8">
            @php
    $locations = [
      ['Location 1', $data->lat, $data->lng],
      ]
@endphp
          <div class="lisitng-map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423286.8827803802!2d-118.74138195907396!3d34.02003924141445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2sLos%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sin!4v1700285010172!5m2!1sen!2sin"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              height="500"
              width="100%"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div> --}}

            <div class="col-lg-8">
                <div class="lisitng-map">

                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
    @php
        $locations = [[$data->address, $data->lat, $data->lng]];
    @endphp

    {{-- map JavaScript Work --}}
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEFV2UwzAK7fN6CoMHc0uK8TnEZCq7B7w"></script>
    <script type="text/javascript">
        function initMap() {
            const myLatLng = {
                lat: 22.2734719,
                lng: 70.7512559
            };

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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEFV2UwzAK7fN6CoMHc0uK8TnEZCq7B7w&callback=initMap" async
        defer></script>
    {{-- js map work Multiple --}}

    </div>
    </div>
@endsection()
