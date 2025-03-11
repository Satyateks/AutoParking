@extends('components.owner.main')
@section('main-container')
<section class="home">
  <div class="container mt-4" >
      <div class="row">
          <div class="table-box">
              <div class="pt-4" style="overflow-x: auto;">
                  <div class="filter-box">
                    <h5> Document Kyc Details</h5>
                      <table id="example">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Full Name</th>
                              <th>Address</th>
                              <th>Country</th>
                              <th>State</th>
                              <th>Zip code</th>
                              <th>Adhar Front</th>
                              <th>Adhar Back</th>
                              <th>Varify</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                                $data=1;
                            @endphp
                            @foreach ($raushan as $item)
                            <tr id="hidden_row3" class="hidden_row">


                              <td colspan="1" class="hide-rowline">
                                  {{ $item->id }}
                              </td>

                              <td colspan="1" class="hide-rowline">
                               {{ $item->address }}
                              </td>
                           <td colspan="1" class="hide-rowline">
                              {{ $item->country }}
                              </td>

                              <td colspan="1" class="hide-rowline">
                                  {{ $item->state }}
                              </td>

                              <td colspan="1" class="hide-rowline">
                                  {{ $item->city }}
                              </td>

                              <td colspan="1" class="hide-rowline">
                                  {{ $item->zip_code }}
                              </td>

                              <td colspan="1" class="hide-rowline">
                                  <img src="{{asset('images_uploade/'.$item->adhar_front)}}" alt="" width="100px" height="100px">
                              </td>

                              <td colspan="1" class="hide-rowline">
                                  <img src="{{asset('images_uploade/'.$item->adhar_back)}}" alt="" width="100px" height="100px">
                              </td>

                              <td colspan="1" class="hide-rowline">
                             @if ($item->is_verify==1)
                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                  <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                                </svg>
                             @else
                              <a href="{{ url('kyc_varification',$item->id) }}">
                                  <i class="fa-solid fa-check"></i>
                              </a>
                                   <a href="{{ url('#') }}">
                                  <i class="fa-solid fa-circle-xmark"></i>
                                   </a>
                              </td>
                           @endif
                              <td colspan="1" class="hide-rowline">
                                  <a href="{{ url('#') }}">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                  </a>

                                  <a href="{{ url('total_user_edit/'.$item->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
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
  </div>

</section>
    @endsection()

