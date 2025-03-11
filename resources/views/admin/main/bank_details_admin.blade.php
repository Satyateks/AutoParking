@extends('components.admin.main')
@section('main-container')



<section class="home">
  <div class="container mt-4" >
      <div class="row">
          <div class="table-box">
              <div class="pt-4" style="overflow-x: auto;">
                  <div class="filter-box">
                    <h3>Bank details</h3>
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
                              <th>Name</th>
                              <th>Bank</th>
                              <th>AC-No</th>
                              <th>Branch</th>
                              <th>Ifsc</th>
                              <th>Mobile</th>
                              <th>Action</th>
                              <th>View</th>
                          </tr>
                          </thead>
                          <tbody>
                            @php
                                $data=1;
                            @endphp
                            @foreach ($raushan as $item)
                                <tr>
                                    <td>{{ $data++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->bank_name }}</td>
                                    <td>{{ $item->account }}</td>
                                    <td>{{ $item->branch }}</td>
                                    <td>{{ $item->ifsc }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td>
                                        <a href="{{ url('bank_details_view_view/'.$item->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                              </svg>
                                        </a>
                                    </td>
                                    <td colspan="1" class="hide-rowline">
                                      <div class="profile-edit-btn">
                                        {{-- <a href="{{ url('bank_details_edit',$item->id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                        </a> --}}
                                        <button data-bs-toggle="modal" class="btn " data-bs-target="#exampleModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                          </button>
                                        <a href="{{ url('bank_details_delete',$item->id)}}">
                                                <i class="bi bi-trash3"></i>
                                        </a>
                                        </div>
                                    </td>

                                </tr>



                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" >Bank details edit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('bank_details_edit', $item->id) }}" method="POST" data-parsley-validate>
            @csrf
        <div class="modal-body">
          <div class="mb-2">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" minlength="1" maxlength="26" placeholder="Name" value="{{ $item->name }}">
          </div>


          <div class="mb-2">
            <label for="exampleInputEmail1" class="form-label">Bank Name</label>
            <input type="text" class="form-control" name="bank_name" id="exampleInputEmail1" aria-describedby="emailHelp" minlength="1" maxlength="26" placeholder="Bank Name" value="{{ $item->bank_name }}">
          </div>


          <div class="mb-2">
            <label for="exampleInputEmail1" class="form-label">Account</label>
            <input type="number" class="form-control" name="account" minlength="10" maxlength="20" id="exampleInputEmail1" maxlength="16" minlength="8"  aria-describedby="emailHelp" placeholder="Account" value="{{ $item->account }}">
          </div>
            <div class="mb-2">
              <label for="exampleInputEmail1" class="form-label">Branch</label>
              <input type="text" class="form-control" name="branch" id="exampleInputEmail1" aria-describedby="emailHelp" maxlength="26" minlength="1" placeholder="Branch" value="{{ $item->branch }}">
            </div>


            <div class="mb-2">
              <label for="exampleInputEmail1" class="form-label">IFSC</label>
              <input type="text" class="form-control" name="ifsc" id="exampleInputEmail1" maxlength="16" minlength="5" aria-describedby="emailHelp" placeholder="IFSC" value="{{ $item->ifsc }}">
            </div>


            <div class="mb-2">
              <label for="exampleInputEmail1" class="form-label">Mobile</label>
              <input type="number" class="form-control" name="phone" minlength="7" maxlength="15" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mobile" value="{{ $item->mobile }}">
            </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Save changes</button>
        </div>
      </div>
    </form>
  </div>
  </div>

</section>
@endforeach
@endsection
