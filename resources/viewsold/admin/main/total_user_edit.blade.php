@extends('components.admin.main')

@section('main-container')
    <section class="home">
        <div class="toggle-sidebar" style="display: none;">
            <i class='bx bx-menu'></i>
        </div>
        <div class="Container pt-3">
            <div class="row foot-tablerow">
                <h5>User Details Edit</h5>
                <div class="col-lg-8 add_testcontent">
                    <form action="{{ url('total_user_edit1/' . $data->id) }}" method="POST" data-parsley-validate>
                        @csrf
                        <div class="mb-4">
                            <label class="mb-2">Name *</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="" value="{{ $data->name }}" maxlength="26"
                                required minlength="1">
                        </div>
                        <div class="mb-4">
                            <label class="mb-2">Email *</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="" data-parsley-whitespace="squish"
                                value="{{ $data->email }}" maxlength="29" required>
                        </div>
                        <div class="mb-4">
                            <label class="mb-2" for="exampleFormControlTextarea1">Phone *</label>
                            <input type="number" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="phone"  value="{{ $data->phone }}" required required maxlength="15" minlength="7"
                                onkeypress="return event.charCode>=48 && event.charCode<=57;"

                                />
                        </div>
                        {{-- <div class="mb-4">
                        <label class="mb-2" for="exampleFormControlTextarea1">Image *</label> <br>
                        <input type="file" id="myfile" name="myfile">
                    </div> --}}
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ url('total_user') }}" class="btn btn-primary">
                            Back
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection()
