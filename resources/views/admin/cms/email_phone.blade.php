@extends('components.admin.main')
@section('main-container')
<section class="home">
    <div class="container mb-4">
        <div class="row">
            <div class="table-box">
                <div class="pt-4" style="overflow-x: auto;">
                    <div class="filter-box">
                        <h1>Total Email & Phone Query</h1>
                    </div>

                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Email & Phone</th>
                               <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        @if ($item->email!='')
                                        {{ $item->email }}
                                        @endif
                                        {{ $item->phone }}
                                    </td>
                                <td><a href="{{ url('email_delete_phone/'.$item->id) }}">
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
@endsection
@push('scripts')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endpush
