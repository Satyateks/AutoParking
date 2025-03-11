@extends('components.admin.main')
@section('main-container')

    <section class="home">
    <div class="container mt-4" >
        <div class="row">
            <div class="table-box">
                <div class="pt-4" style="overflow-x: auto;">
                    <div class="filter-box">
                        <h5>Parking space</h5>
                        {{-- <p>Check your order here</p> --}}
                        {{-- <div class="new-filter">
                            <div class="d-flex">
                                <input class="search" type="search" placeholder="Search...">
                            </div>
                        </div> --}}

                        <table id="example">
                            <thead>
                                <tr>
                                    <th>S No.</th>
                                    <th>ZIP CODE</th>
                                    <th>TYPE OF SPCACE</th>
                                    <th>DAILY PRICE</th>
                                    <th>WEEKLY PRICE</th>
                                    <th>MONTHALY PRICE</th>
                                    <th>HOURLY PRICE</th>
                                    <th>COUNTRY</th>
                                    <th>ADDRESS</th>
                                     <th>IMAGE</th>
                                     <th>Description</th>
                                     <th>Approved/UnApproved </th>
                                     <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($owner as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->zip_code }}</td>
                                        <td>{{ $item->type_of_space}}</td>
                                        <td>{{ $item->daily }}</td>
                                        <td>{{ $item->weekly }}</td>
                                         <td>{{$item->monthly}}</td>
                                         <td>{{$item->hourly}}</td>
                                        @php
                                  $country = DB::table('countries')->where('id', $item->country)->first()
                                        @endphp
                                            <td colspan="1" class="hide-rowline">
                                                {{
                                                $country->country_name
                                                }}
                                            </td>
                                        <td>{{ $item->address }}</td>
                                        <td> <img src="{{asset('images_uploade/'.$item->image)}}" width="100px" height="100px" alt=""></td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                        @if ($item->is_verify == 0)
                                            <a href="{{ url('parking_verify/'.$item->id) }}">
                                                <i class="bi bi-toggle2-off"></i>
                                            </a>
                                            @elseif($item->is_verify == 1)
                                        <a href="{{ url('parking_verify/'.$item->id) }}">
                                            <i class="bi bi-toggle-on"></i>
                                        </a>
                                        @endif
                                        </td>
                                        <td>

                                        <a href="{{ url('admin_parking_edit/'.$item->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                              </svg>
                                        </a>
                                        <a href="{{ route('parking_delete',$item->id) }}">
                                            <i class="bi bi-trash3"></i>
                                        </a>


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
    </section>

@endsection()
