@extends('components.admin.main')
@section('main-container')

<section class="home">

    <div class="toggle-sidebar" style="display: none;">
        <i class='bx bx-menu'></i>
    </div>

    <div class="Container">
        <div class="row dashboard-row">
            <div class="col-lg-3">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Home Page Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                            <img id="blah" src="{{ asset('images_uploade/'.$oi1->image) }}" width="200" height="70" alt="your image" class="mt-3">
                        </div>
                        <div class="pt-4">
                        <form action="{{ url('owner_banner_post1') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <h5>Change Banner</h5>
                            <input type="hidden" name="oi1" value="oi1">
                            <input type='file' name="oi1"  class="pt-2">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>About Page Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                            <img id="blah" src="{{ asset('images_uploade/'.$oi2->image) }}" width="200" height="70" alt="your image" class="mt-3">
                        </div>
                        <div class="pt-4">
                            <form action="{{ url('owner_banner_post2') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <h5>Change Banner</h5>
                            <input type="hidden" name="oi2" value="oi2">
                            <input type='file' name="oi2" onchange="readURL(this);" class="pt-2">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Service Page Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                            <img id="blah" src="{{ asset('images_uploade/'.$oi3->image) }}" width="200" height="70" alt="your image" class="mt-3">
                        </div>
                        <div class="pt-4">
                            <form action="{{ url('owner_banner_post3') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <h5>Change Banner</h5>
                            <input type="hidden" name="oi3" value="oi3">
                            <input type='file' name="oi3" onchange="readURL(this);" class="pt-2">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row dashboard-row">
            <div class="col-lg-3">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Contact Page Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                            <img id="blah" src="{{ asset('images_uploade/'.$m3->image) }}" width="200" height="70" alt="your image" class="mt-3">
                        </div>
                        <div class="pt-4">
                            <form action="{{ url('banner_post3') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <h5>Change Banner</h5>
                            <input type="hidden" name="m3" value="m3">
                            <input type='file' name="img3" onchange="readURL(this);" class="pt-2">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>

        </div> --}}
    </div>

</section>
@endsection()
