@extends('components.owner.main')

@section('main-container')

      <div class="container pt-4 pb-4">

       

        <div class="row">
            @php
            $raushan=1
         @endphp
        @foreach ($data as $item)
          <div class="col-lg-6">
            <div class="my-spacebox">
                <div class="color-border">
                    <h5>{{ $raushan++ }} Parking Space</h5>
                </div>
                <div class="inside-spacebox">
                    <h4>{{ $item->address }}</h4>
                    <div class="inside-img">
                        <img src="{{asset('images_uploade/'.$item->image)}}" alt="" width="120px" height="170px">
                    </div>
                    <div class="my-space-detail pt-3 mb-2">
                        <div class="me-4">
                            <h6>Parking Price</h6>
                            <p>Hourly price:{{ $item->hourly }}/Daily price:{{ $item->daily }}/Weekly price:{{ $item->weekly }}/Monthly price:{{ $item->monthly }}</p>
                            <p></p>
                            <p></p>
                            <p></p>
                        </div>
                        <div>

                        </div>
                        <div>
                            <h6>Status</h6>
                            @if($item->is_verify == '0')
                            <p>Unapproved</p>
                            @elseif($item->is_verify == '1')
                            <p>Approved</p>
                            @endif
                        </div>
                        <div>
                            {{-- <h6>
                                country:{{ $item->country }}
                            </h6> --}}
                        </div>
                    </div>
                    <button class="mb-2" onclick="location.href = '{{ url('parking_edit/'.$item->id) }}';">Edit Listing <i class="bi bi-pencil-fill"></i></button>
                </div>
            </div>
          </div>
          @endforeach
        </div>

</div>


   @endsection()
