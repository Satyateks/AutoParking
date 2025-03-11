@extends('components.user.main')
@section('main-container')



<div class="container pt-4 mb-4">
    <div class="row" style="justify-content: center;">
        <div class="col-lg-8 pt-4">
            <h5 class="profile-heading">My Profile</h5>
            <div class="row profile-box mt-3">
                <div class="col-lg-4">
                    <div class="profile-info">
                        <div class="me-3"> <img src="{{ asset('user/images/profile.png') }}" width="60" height="60" alt=""> </div>
                        <div> <h4>{{ Auth::user()->name }}</h4>
                        <h6>{{ Auth::user()->email }}</h6> </div>
                    </div>
                 </div>
                 <div class="col-lg-6"></div>
                 <div class="col-lg-2">
                    <div  class="profile-edit-btn " data-bs-toggle="modal"  data-bs-target="#exampleModal1"  >
                        <button > Edit <i class="bi bi-pencil"></i></button>
                    </div>
                 </div>
                 <div class="col-lg-4 pt-5 mb-3">
                    <div class="profile-info">
                        <h5>Personal Information</h5>
                    </div>
                 </div>
                 <div class="col-lg-8"></div>
                 <div class="col-lg-5">
                    <form class="profile-form">
                        <h5>Full Name</h5>
                        <h6>{{ $data->name }}</h6>
                      </form>
                 </div>

                 <div class="col-lg-2"></div>
                 <div class="col-lg-5">
                    <form class="profile-form">
                        <h5>Email Address</h5>
                        <h6>{{ $data->email }}</h6>
                      </form>
                 </div>
                 <div class="col-lg-5">
                    <form class="profile-form">
                        <h5>Phone</h5>
                        <h6>+91 {{ $data->phone }}</h6>
                      </form>
                 </div>
                 <div class="col-lg-2"></div>
                 <div class="col-lg-5">
                    <form class="profile-form">
                        <h5>DOB</h5>
                        <h6>{{ date('Y-m-d', strtotime($data->dob ?? '')) }}</h6>
                      </form>
                 </div>
                 <div class="col-lg-5">
                    <form class="profile-form">
                        <h5>Vehicle Number</h5>
                        <h6>{{ $data->vehicle ?? ''}}</h6>
                      </form>
                 </div>
                 <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
</div>



<div
class="modal fade"
id="exampleModal1"
tabindex="-1"
aria-labelledby="exampleModalLabel"
aria-hidden="true"
>
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header request-query-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel">
        Profile Details
      </h1>
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"
      ></button>
    </div>
    <div class="modal-body post-query-body">
      <form class="row pt-4"method="post" action="{{url('user_profile')}}" data-parsley-validate>
          @csrf
            <div class="mb-4">
              <label for="exampleInputEmail1" class="form-label">Full Name</label>
              <input type="text" class="form-control"  placeholder="first Name " value="{{Auth::user()->name}}" name="name" required data-parsley-whitespace="squish" maxlength="26" required>
            </div>
            {{-- <div class="mb-4">
              <label for="exampleInputEmail1" class="form-label">Last Name</label>
              <input type="text" class="form-control"  placeholder="Last Name" name="last_name" value="{{Auth::user()->name}}" required data-parsley-whitespace="squish">
            </div> --}}
              {{-- <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Email ID</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{Auth::user()->email}}"  value="{{Auth::user()->email ?? ''}}"required data-parsley-whitespace="squish">
              </div> --}}
              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Email ID</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->email ?? '' }}" disabled required data-parsley-whitespace="squish"
                required maxlength="26" minlength="7"

                />
            </div>

              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                <input type="number" class="form-control" name="phone" value="{{Auth::user()->phone ?? ''}}"required data-parsley-whitespace="squish"
                required maxlength="15" minlength="7"
                                onkeypress="return event.charCode>=48 && event.charCode<=57;"/>
              </div>


             

              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">DOB</label>
                <input type="date" class="form-control" name="dob" placeholder="DOB" value="{{ date('Y-m-d', strtotime(Auth::user()->dob)) ?? '' }}"
                max="{{ date('Y-m-d') }}" data-parsley-whitespace="squish">
            </div>




              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">vehicle number</label>
                <input class="form-control" placeholder="Enter your vahicle number" name="vehicle"  id="floatingTextarea2"  data-parsley-whitespace="squish" value="{{Auth::user()->vehicle  ?? ''}}" maxlength="20" minlength="4">
              </div>


              <button class="btn btn-primary" type="submit">Save & Continue</button>
          </form>
      <hr/>

    </div>
  </div>
</div>
</div>


@endsection()


