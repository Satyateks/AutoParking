@extends('components.admin.main')
@section('main-container')

<section class="home">
    <div class="toggle-sidebar" style="display: none;">
        <i class='bx bx-menu'></i>
    </div>
    <div class="Container pt-3">
        <div class="row foot-tablerow">
            <h3>Contact Form Query</h3>
            <div class="col-lg-10 maintable-column">
                <div class="container mt-4">
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Description</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $raushan=1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                <td> {{ $raushan++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->space }}</td>
                                    <td>{{ $item->message }}</td>
                                    <td>
                                        <a href="{{ url('contact_list_delete/'.$item->id) }}">
                                            <i class="bi bi-trash"></i>
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

</section>
@endsection()
