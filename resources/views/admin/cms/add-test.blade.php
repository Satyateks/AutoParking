@extends('components.admin.main')

@section('main-container')

<script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
<section class="home">
    <div class="toggle-sidebar" style="display: none;">
        <i class='bx bx-menu'></i>
    </div>

    <div class="Container pt-3">
        <div class="row foot-tablerow">
            <h5>Add Testimonial</h5>
            <div class="col-lg-8 add_testcontent">
                {{-- <form action="{{ url('add_test') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="mb-2">Name *</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="name" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label class="mb-2">Designation *</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="des" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label class="mb-2" for="exampleFormControlTextarea1">Comment *</label>
                        <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb-4"> --}}
                        {{-- <label class="mb-2" for="exampleFormControlTextarea1">Image *</label> <br> --}}
                        {{-- <input type="file" id="myfile" name="img0"> --}}
                        {{-- <input type="file" class="form-control" name="photo" id="image" maxlength="200" minlength="200" required required accept=".pdf,.jpg,.jpeg,.png">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>

                </form> --}}

                <form action="{{ url('add_test') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                    @csrf
                    <div class="mb-4">
                        <label class="mb-2">Name *</label>
                        <input type="text" class="form-control" name="name" placeholder="" required  data-parsley-length="[1, 50]"  data-parsley-required-message="Please enter your name" >
                    </div>
                    <div class="mb-4">
                        <label class="mb-2">Designation *</label>
                        <input type="text" class="form-control" name="des" placeholder="" required data-parsley-length="[3, 50]" data-parsley-required-message="Please enter your designation">
                    </div>
                    <div class="mb-4">
                        <label class="mb-2" for="exampleFormControlTextarea1">Comment *</label>
                        <textarea class="form-control" name="comment" rows="3" data-parsley-length="[20, 130]" required data-parsley-required-message="Please enter your comment"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="mb-2" for="exampleFormControlTextarea1">Image *</label> <br>
                        <input type="file" class="form-control" name="photo" id="image" required accept=".jpg,.jpeg,.png" data-parsley-required-message="Please select an image file" data-parsley-filemaxmegabytes="2" data-parsley-filemimetypes="image/jpeg,image/png" data-parsley-trigger="change">
                        <small class="form-text text-muted">Max file size: 2MB. Allowed file types: jpg, jpeg, png.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('testimonials') }}" class="btn btn-primary">
                        Back
                    </a>
                </form>






            </div>
        </div>
    </div>

</section>

@endsection()
