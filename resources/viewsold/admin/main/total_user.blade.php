@extends('components.admin.main')
@section('main-container')
<section class="home">
    <div class="container mb-4">
        <div class="row">
            <div class="table-box">
                <div class="pt-4" style="overflow-x: auto;">
                    <div class="filter-box">
                        <h1>Total User</h1>
                    </div>

                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($total_paking as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>@if ($item->isActive == '1')
                                        <a href="{{ url('isActive/'.$item->id) }}">
                                            {{-- <i class="bi bi-lock"></i> --}}
                                            <i class="bi bi-toggle2-off"></i>
                                        </a>
                                        @elseif($item->isActive == '0')
                                        <a href="{{ url('isActive/'.$item->id) }}">
                                            {{-- <i class="bi bi-lock-fill"></i> --}}
                                            <i class="bi bi-toggle-on"></i>
                                        </a>
                                        @endif</td>

                                    <td colspan="1" class="hide-rowline ">
                                        <a href="{{ url('total_user_edit1',$item->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                        </a>

                                        <a href="{{ url('user_delete_user/'.$item->id) }}">
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
</section>
@endsection
@push('scripts')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endpush
