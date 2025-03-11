@extends('components.admin.main')

@section('main-container')
<section class="home">

    <div class="toggle-sidebar" style="display: none;">
        <i class='bx bx-menu'></i>
    </div>

    <div class="Container pt-3">
        <div class="row foot-tablerow">
            <h5>Edit Testimonial</h5>
            <div class="col-lg-8 add_testcontent">
                <form>
                    <div class="mb-4">
                        <label class="mb-2">Name *</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Akash Rawat">
                    </div>
                    <div class="mb-4">
                        <label class="mb-2">Designation *</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="What our clients tell about us">
                    </div>
                    <div class="mb-4">
                        <label class="mb-2" for="exampleFormControlTextarea1">Comment *</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb-4">
                        <div>
                            <label>Existing image</label> <br>
                            <img id="blah" src="http://placehold.it/180" alt="your image" class="mt-3">
                        </div>
                        <div class="pt-3">
                            <label>Change image</label> <br>
                            <input type='file' onchange="readURL(this);" class="pt-3">
                        </div>
                    </div>
                </form>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>

</section>
@endsection()
