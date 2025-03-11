@extends('components.admin.main')

@section('main-container')
<section class="home">

    <div class="toggle-sidebar" style="display: none;">
        <i class='bx bx-menu'></i>
    </div>

    <div class="Container pt-3">
        <div class="row foot-tablerow">
            <h5>Testimonial</h5>
            <div class="col-lg-10 maintable-column">
                <div class="add-btntest">
                    <a href="{{ url('add_test') }}"><i class="fa-solid fa-plus"></i> &nbsp; Add New</a>
                </div>
                <div class="container mt-4">
                    <table id="example" class="table">
                        <thead>
                            <tr>

                                <th>SL</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                             $i=1
                            @endphp
                                @foreach ($collection as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <img src="{{ asset('images_uploaded/'.$item->photo) }}" width="100px" height="100px" alt="">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->des }}</td>
                                <td>{{ $item->comment }}</td>
                                <td>
                                    <a href="{{ url('add_edit/'.$item->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>

                                    &nbsp;
                                    <a href="{{ url('add_delete/'.$item->id) }}">
                                        <i
                                        class="fa-solid fa-trash"></i>
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
