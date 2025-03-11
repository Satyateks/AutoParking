@extends('components.admin.main')
@section('main-container')

<section class="home">
<div class="container mb-4" >
    <div class="row">
        <div class="table-box">
            <div class="pt-4" style="overflow-x: auto;">
                <div class="filter-box">
                    <h5>Seller 15 Days Record</h5>
                    {{-- <p>Check your order here</p> --}}
                    {{-- <div class="new-filter">
                        <div class="d-flex">
                            <input class="search" type="search" placeholder="Search...">
                        </div>
                    </div> --}}

                <table id="example">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>ORDER ID</th>
                        <th>Order Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $id = 1;
                        @endphp
                    @foreach ($total_seller_amount as $item)
                        <tr>
                            <td>{{$id++ }}</td>
                            <td>{{$item->owner_id}}</td>
                            <td>{{$item->total_amount}}</td>
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

    @endsection()
