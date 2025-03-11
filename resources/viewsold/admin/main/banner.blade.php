@extends('components.admin.main')
@section('main-container')

<section class="home">

    <div class="toggle-sidebar" style="display: none;">
        <i class='bx bx-menu'></i>
    </div>

    <div class="Container">
        <div class="row dashboard-row">
            <div class="col-lg-6">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Main Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                            <img id="blah" src="{{ asset('images_uploade/'.$m0->image) }}" width="200" height="70" alt="your image" class="mt-3">
                        </div>
                        <div class="pt-4">
                        <form action="{{ url('banner_post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <h5>Change Banner</h5>
                            <input type="hidden" name="m0" value="m0">
                            <input type='file' name="img0"  class="pt-2" required accept=".jpg,.jpeg,.png">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>About`us Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                            <img id="blah" src="{{ asset('images_uploade/'.$m1->image) }}" width="200" height="70" alt="your image" class="mt-3">
                        </div>
                        <div class="pt-4">
                            <form action="{{ url('banner_post1') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <h5>Change Banner</h5>
                            <input type="hidden" name="m1" value="m1">
                            <input type='file' name="img1" onchange="readURL(this);" class="pt-2" required accept=".jpg,.jpeg,.png">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Service Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                            <img id="blah" src="{{ asset('images_uploade/'.$m2->image) }}" width="200" height="70" alt="your image" class="mt-3" required accept=".jpg,.jpeg,.png">
                        </div>
                        <div class="pt-4">
                            <form action="{{ url('banner_post2') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <h5>Change Banner</h5>
                            <input type="hidden" name="m2" value="m2">
                            <input type='file' name="img2" onchange="readURL(this);" class="pt-2">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Why Choose Auto Park Banner Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                            <img id="blah" src="{{ asset('images_uploade/'.$m3->image) }}" width="200" height="70" alt="your image" class="mt-3">
                        </div>
                        <div class="pt-4">
                            <form action="{{ url('banner_post3') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                            <h5>Change Banner</h5>
                            <input type="hidden" name="m3" value="m3">
                            <input type='file' name="img3" onchange="readURL(this);" class="pt-2" required accept=".jpg,.jpeg,.png">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>

            </div>

        </div>
        </div>

    </div>

</section>
@endsection()
