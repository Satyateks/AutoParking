@extends('components.owner.main')

@section('main-container')
    <div class="container-fluid owner-banner">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center pt-5 mt-4">
                <h2>Renting Parking Space Made Easy</h2>
                <p class="pt-3 pb-4">Our all-in-one service is designed to provide convenience and sustainability to our
                    customers. <br>
                    With our state-of-the-art facilities, you can rest assured that your vehicle is in <br>
                    good hands while you go about your day. </p>
                <button type="button" onclick="location.href = '{{ url('events') }}';">Rent Your Space Now</button>
            </div>
        </div>
    </div>

    <div class="container key-features-section pt-5 pb-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="key-content-column pb-5">
                    <div>
                        <h5>Short-Term Lot</h5>
                        <p>Praesent molestie neque et vitae massa <br>
                            porttitor consequat. Donec pulvinar <br>
                            dolor magna urna.</p>
                    </div>
                    <div>
                        <img src="user/images/key.png" width="50" height="50" alt="">
                    </div>
                </div>
                <div class="key-content-column pb-5 pt-5">
                    <div>
                        <h5>Short-Term Lot</h5>
                        <p>Praesent molestie neque et vitae massa <br>
                            porttitor consequat. Donec pulvinar <br>
                            dolor magna urna.</p>
                    </div>
                    <div>
                        <img src="user/images/key.png" width="50" height="50" alt="">
                    </div>
                </div>
                <div class="key-content-column pt-5 mt-4">
                    <div>
                        <h5>Short-Term Lot</h5>
                        <p>Praesent molestie neque et vitae massa <br>
                            porttitor consequat. Donec pulvinar <br>
                            dolor magna urna.</p>
                    </div>
                    <div>
                        <img src="user/images/key.png" width="50" height="50" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="key-banner" style="overflow: hidden;">
                    <img src="user/images/key-banner.png" alt="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="key-content-column2 pb-5">
                    <div>
                        <img src="user/images/key.png" width="50" height="50" alt="">
                    </div>
                    <div>
                        <h5>Short-Term Lot</h5>
                        <p>Praesent molestie neque et vitae massa <br>
                            porttitor consequat. Donec pulvinar <br>
                            dolor magna urna.</p>
                    </div>
                </div>
                <div class="key-content-column2 pb-5 pt-5">
                    <div>
                        <img src="user/images/key.png" width="50" height="50" alt="">
                    </div>
                    <div>
                        <h5>Short-Term Lot</h5>
                        <p>Praesent molestie neque et vitae massa <br>
                            porttitor consequat. Donec pulvinar <br>
                            dolor magna urna.</p>
                    </div>
                </div>
                <div class="key-content-column2 pt-5 mt-4">
                    <div>
                        <img src="user/images/key.png" width="50" height="50" alt="">
                    </div>
                    <div>
                        <h5>Short-Term Lot</h5>
                        <p>Praesent molestie neque et vitae massa <br>
                            porttitor consequat. Donec pulvinar <br>
                            dolor magna urna.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="conatiner-fluid amenities-section">
        <div class="container pt-5 pb-4">
            <h5>{{ $Industries->value1 }}</h5>
            <div class="amenities-border"></div>
            <div class="row amenities-row pt-5">
                <div class="col-md-6 col-lg-2 col-6">
                    <div class="parking-column">
                        <div class="parking-img-column mb-2">
                            <img src="{{ 'onwer/images/park.png' }}" width="45" height="45" alt="">
                        </div>
                        <h6>{{ $Industries->value2 }}</h6>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 col-6">
                    <div class="parking-column">
                        <div class="parking-img-column mb-2">
                            <img src="{{ 'onwer/images/park1.png' }}" width="45" height="45" alt="">
                        </div>
                        <h6>{{ $Industries->value3 }}</h6>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 col-6">
                    <div class="parking-column">
                        <div class="parking-img-column mb-2">
                            <img src="{{ 'onwer/images/park2.png' }}" width="45" height="45" alt="">
                        </div>
                        <h6>{{ $Industries->value4 }}</h6>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 col-6">
                    <div class="parking-column">
                        <div class="parking-img-column mb-2">
                            <img src="{{ 'onwer/images/park2.png' }}" width="45" height="45" alt="">
                        </div>
                        <h6>{{ $Industries->value5 }}</h6>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 col-6">
                    <div class="parking-column">
                        <div class="parking-img-column mb-2">
                            <img src="{{ 'onwer/images/park2.png' }}" width="45" height="45" alt="">
                        </div>
                        <h6>{{ $Industries->value6 }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid counter-banner">
        <div class="container pt-5">
            <div class="row counter-row pt-5">
                <div class="col-lg-3">
                    <div class="counter-column">
                        <h4>Our Total Clients</h4>
                        <h5>{{ $all->value1 }}</h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="counter-column">
                        <h4>Parking Space Listed</h4>
                        <h5>{{ $all->value2 }}</h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="counter-column">
                        <h4>Space Owner</h4>
                        <h5>{{ $all->value3 }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
