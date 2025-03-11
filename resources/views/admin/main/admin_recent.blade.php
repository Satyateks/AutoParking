@extends('components.admin.main')
@section('main-container')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"> --}}
<section class="home">
<div class="container mb-4" >
    <div class="row">
        <div class="table-box">
            <div class="pt-4" style="overflow-x: auto;">
                <div class="filter-box">
                    <h1>Recent Order</h1>
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
                        <th>ORDER ID</th>
                        <th>CHECKIN DATE</th>
                        <th>CHECKOUT OUT</th>
                        <th>PRICE</th>
                        <th>Order Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    @foreach ($all_order as $item)

                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->order_name }}</td>
                            <td>{{ $item->order_id}}</td>
                            <td>{{ $item->order_date }}</td>
                            <td>{{ $item->delivary_date }}</td>
                            <td>{{$item->order_price}}</td>
                            <td>{{$item->status}}</td>
                        </tr>

                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
</section>
{{-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
 new DataTable('#example');
</script> --}}
    @endsection()
