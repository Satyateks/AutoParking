@extends('components.admin.main')

@section('main-container')

<script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>

<section class="home">

    <div class="toggle-sidebar" style="display: none;">
        <i class='bx bx-menu'></i>
    </div>

    <div class="Container pt-3">
        <div class="row foot-tablerow">
            <h5>Add Storage Sompany Slider</h5>
            <div class="col-lg-8 add_testcontent">
                <form action="{{ url('add_cru_test') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                    @csrf
                    {{-- <div class="mb-4">
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
                    </div> --}}
                    <div class="mb-4">
                        <label class="mb-2" for="exampleFormControlTextarea1">Image *</label> <br>
                        {{-- <input type="file" id="myfile" name="img0"> --}}
                        <input type="file" class="form-control" name="photo" id="image"  required required accept=".jpg,.jpeg,.png" required accept=".pdf,.jpg,.jpeg,.png" data-parsley-required-message="Please select an image file" data-parsley-filemaxmegabytes="2" data-parsley-filemimetypes="image/jpeg,image/png" data-parsley-trigger="change">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('add_cru') }}" class="btn btn-primary">
                        Back
                    </a>
                </form>
                {{-- <a href="{{ url('add_cru') }}">
                    <button class="btn btn-primary" onclick="goBack()">Back</button>

                </a> --}}

            </div>
        </div>
    </div>

</section>

@endsection()
