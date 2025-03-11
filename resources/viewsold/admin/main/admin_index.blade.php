
@extends('components.admin.main')
@section('main-container')



<style>
    .status{

    }
</style>
    <!-- ============= Home Section =============== -->
    <section class="home">

        <div class="toggle-sidebar" style="display: none;">
            <i class='bx bx-menu'></i>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <a href="{{ url('total_user') }}">
                    <div class="admin-dashbox">
                        <h5>{{$all_user ?? '0'}}</h5>
                        <h6 class="pt-2">Total users</h6>
                    </div>
                </a>
                </div>


                <div class="col-lg-2">
                    <a href="{{ url('total_owner') }}">
                    <div class="admin-dashbox">
                        <h5>{{$total_paking_owner ?? "0"}}</h5>
                       <h6 class="pt-2">Total Owners</h6>
                    </div>
                </a>
                </div>


                <div class="col-lg-2">
                    <a href="{{ url('total_paking') }}">
                    <div class="admin-dashbox">
                        <h5>{{$all_parkspace ?? "0"}}</h5>
                        <h6 class="pt-2">Total Parking Spaces</h6>
                    </div>
                </a>
                </div>

                {{-- <div class="col-lg-3">
                    <div class="admin-dashbox">
                        <h5>{{$all_booking ?? "0"}}</h5>
                        <a href="{{ url('admin_recent_order') }}"><h6 class="pt-2">Total Bookings</h6></a>

                    </div>
                </div> --}}

                <div class="col-lg-2">
                    <a href="{{ url('admin_index') }}">
                    <div class="admin-dashbox">
                        <h5>{{ $all_booking }}</h5>
                        {{-- <a href="{{ url('admin_recent_order') }}"><h6 class="pt-2">Total Booking</h6></a> --}}
                         <h6 class="pt-2">Total Booking</h6>
                    </div>
                    </a>
                </div>

                <div class="col-lg-2">
                    <div class="admin-dashbox">
                        <?php
                        $total_price = DB::table('recent_order')->sum('order_price');
                        ?>
                        <h5>{{ $total_price }}$</h5>
                        <h6 class="pt-2">Total Booking Amount</h6>
                        <html></html>
                    </div>
                </div>


                <div class="container mb-4" >
                    <div class="row">
                        <div class="table-box">
                            <div class="pt-4" style="overflow-x: auto;">
                                <div class="filter-box">
                                   <H3>Recent Order</H3>
                                    {{-- <div class="new-filter">
                                        <div class="d-flex">
                                            <input class="search" type="search" placeholder="Search...">
                                        </div>
                                    </div> --}}

                                <table id="example">
                                    <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Order Address</th>
                                        <th>Order ID</th>
                                        <th>Check-in Date</th>
                                        <th>Check-out Date</th>
                                        <th>Price</th>
                                        <th>Order Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                    @foreach ($all_order as $item)

                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->order_name }}</td>
                                            <td>{{ $item->order_id}}</td>
                                            <td>{{ $item->order_date }}</td>
                                            <td>{{ $item->delivary_date }}</td>
                                            <td>{{$item->order_price}}</td>
                                            <td>
                                                @if($item->status == "booked")
                                                    <p class="status">Booked</p>
                                                @elseif($item->status == "cancel")
                                                    <p class="status2" >Cancle</p>
                                                @else
                                                    <p class="status1">Pending</p>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </section>
    @endsection()
