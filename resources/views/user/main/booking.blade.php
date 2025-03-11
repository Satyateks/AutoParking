@extends('components.user.main')

@section('main-container')




<div class="container pt-4 mb-4">
    <div class="row">
      <div class="col-lg-6">
          <ul class="nav nav-pills mb-3 border-bottom border-2" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link text-primary fw-semibold active position-relative " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Booking  In Progress</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link text-primary fw-semibold position-relative " id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Upcoming Bookings</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link text-primary fw-semibold position-relative" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Past Bookings</button>
              </li>
            </ul>
            <div class="tab-content border-primary text-danger" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                @foreach($futureOrders as $booking)
                <div class="main-booking-div">
                    <div class="booking-detail mb-4">
                        <div>
                            <h6>{{ $booking->order_name }}</h6>
                            <div class="d-flex">
                                {{-- <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i> &nbsp;
                                <span>&nbsp; (4.6)</span> --}}
                                {{-- <h5>{{ $booking->owner_id }}</h5> $booking->owner_id--}}
                                @php
                                $ddd=DB::table('recent_order')->where('user_id',Auth::user()->id)->first();
                              @endphp
                           @for ($i = 0; $i < ($booking->rating ?? 0); $i++)
                           <i class="bi bi-star-fill"></i>
                             @endfor
                         <span>&nbsp; ({{($booking->final_rating ?? 0)}})</span>

                            </div>
                        </div>
                        <div>
                            <h5>$ {{ $booking->order_price }}</h5>
                        </div>
                    </div>
                        <div class="row bookings-time-row">
                            <div class="col-lg-5">
                                <p> From <a href="#">Today at {{ $booking->order_date }}</a> </p>
                            </div>
                            <div class="col-lg-5">
                                <p> Until <a href="#">Today at {{ $booking->delivary_date }}</a> </p>
                            </div>


                    </div>
                </div>
                @endforeach

              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">


                        @foreach($futureOrders as $booking)
                        <div class="main-booking-div">
                            <div class="booking-detail mb-4">
                                <div>
                                    <h6>{{ $booking->order_name }}</h6>
                                    <div class="d-flex">
                                        {{-- <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i> &nbsp;
                                        <span>&nbsp; (4.6)</span> --}}
                                        {{-- <h5>{{ $booking->owner_id }}</h5> $booking->owner_id--}}
                                        @php
                                        $ddd=DB::table('recent_order')->where('user_id',Auth::user()->id)->first();
                                      @endphp
                                   @for ($i = 0; $i < ($booking->rating ?? 0); $i++)
                                   <i class="bi bi-star-fill"></i>
                                     @endfor
                                 <span>&nbsp; ({{($booking->final_rating ?? 0)}})</span>

                                    </div>
                                </div>
                                <div>
                                    <h5>$ {{ $booking->order_price }}</h5>
                                </div>
                            </div>
                                <div class="row bookings-time-row">
                                    <div class="col-lg-5">
                                        <p> From <a href="#">Today at {{ $booking->order_date }}</a> </p>
                                    </div>
                                    <div class="col-lg-5">
                                        <p> Until <a href="#">Today at {{ $booking->delivary_date }}</a> </p>
                                    </div>


                            </div>
                        </div>
                        @endforeach

              </div>
              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">


                @foreach($pastOrders as $booking)
                <div class="main-booking-div">
                    <div class="booking-detail mb-4">
                        <div>
                            <h6>{{ $booking->order_name }}</h6>
                            <div class="d-flex">


                                @php
                                 $ddd=DB::table('parking_space')->where('id',$booking->owner_id)->first();
                               @endphp
                            @for ($i = 0; $i < ($booking->final_rating ?? 0); $i++)
                            <i class="bi bi-star-fill"></i>
                              @endfor
                          <span>&nbsp; ({{($booking->final_rating ?? 0)}})</span>
                            </div>
                        </div>
                        <div>
                            <h5>$ {{ $booking->order_price }}</h5>
                        </div>
                    </div>
                        <div class="row bookings-time-row past-booking">

                            <div class="col-lg-5">
                                <p> From <a href="#">Today at {{ $booking->order_date }}</a> </p>
                            </div>
                            <div class="col-lg-5">
                                <p> Until <a href="#">Today at {{ $booking->delivary_date }}</a> </p>
                            </div>
                        </div>


                </div>
                @endforeach


              </div>
            </div>
        </div>
      </div>
    </div>





@endsection
