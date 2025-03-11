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
                <form>
                    <div class="mb-4">
                        <label class="mb-2">Name *</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label class="mb-2">Designation *</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label class="mb-2" for="exampleFormControlTextarea1">Comment *</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="mb-2" for="exampleFormControlTextarea1">Image *</label> <br>
                        <input type="file" id="myfile" name="myfile">
                    </div>
                </form>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>

</section>

@endsection()
