@extends('components.admin.main')

@section('main-container')


<section class="home">

    <div class="toggle-sidebar" style="display: none;">
        <i class='bx bx-menu'></i>
    </div>

    <div class="Container pt-3">
        <div class="row foot-tablerow">
            <h5>Add Testimonial</h5>
            <div class="col-lg-8 add_testcontent">
                <form action="{{ url('add_cru_edit/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="mb-4">
                        <label class="mb-2">Name *</label>
                        <input type="text" class="form-control" value="{{ $data->name }}" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="name" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label class="mb-2">Designation *</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ $data->des }}" name="des" placeholder="">
                    </div> --}}
                    {{-- <div class="mb-4">
                        <label class="mb-2" for="exampleFormControlTextarea1">Comment *</label>
                        <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3">{{ $data->comment }}</textarea>
                    </div> --}}
                    <div>
                        <img src="{{ asset('images_uploaded/'.$data->photo) }}" width="100px" height="100px" alt="">
                    </div>

                    <div class="mb-4">
                        <input type="file" class="form-control"  value="{{ $data->photo }}" name="photo" required id="image" accept=".jpg,.jpeg,.png">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    {{-- <a class="btn btn-primary" onclick="location.href='add_cru';">Back</a> --}}
                    <a href="{{ url('add_cru') }}" class="btn btn-primary">
                        Back
                    </a>
                </form>


                {{-- <form action="{{ url('photo_edit/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <input type="file" class="form-control"  value="{{ $data->photo }}" name="photo" id="image" accept=".pdf,.jpg,.jpeg,.png">
                        <button type="submit"  class="btn btn-success">Submit</button>
                    </div>
                </form> --}}

            </div>
        </div>
    </div>

</section>

@endsection()
