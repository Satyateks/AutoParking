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
                        {{-- <h4>Home Page Banner</h4> --}}
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            {{-- <h5>Existing Banner</h5> --}}
                            <img id="blah" src="{{ asset('images_uploade/'.$i1->image) ?? ''}}" width="200" height="70" alt="your image" class="mt-3">
                        </div>
                        <div class="pt-4">
                            {{-- <h5>Change Banner</h5> --}}
                    <form action="{{ url('tools_post1') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                           <input type="hidden" name="i1" value="i1">
                            <input type='file' name="i1" onchange="readURL(this);" class="pt-2" required accept=".jpg,.jpeg,.png">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        {{-- <h4>About Page Banner</h4> --}}
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            {{-- <h5>Existing Banner</h5> --}}
                            <img id="blah" src="{{ asset('images_uploade/'.$i2->image) ?? ''}}" width="200" height="70" alt="your image" class="mt-3">
                        </div>
                        <div class="pt-4">
                            {{-- <h5>Change Banner</h5> --}}
                            <form action="{{ url('tools_post2') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="i2" value="i2">
                            <input type='file' name="i2" onchange="readURL(this);" class="pt-2" required accept=".jpg,.jpeg,.png">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        {{-- <h4>Service Page Banner</h4> --}}
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            {{-- <h5>Existing Banner</h5> --}}
                            <img id="blah" src="{{ asset('images_uploade/'.$i3->image) ?? ''}}" width="200" height="70" alt="your image" class="mt-3">
                        </div>
                        <div class="pt-4">
                            {{-- <h5>Change Banner</h5> --}}
                            <form action="{{ url('tools_post3') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="i3" value="i3">
                            <input type='file' name="i3" onchange="readURL(this);" class="pt-2" required accept=".jpg,.jpeg,.png">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row dashboard-row">
            <div class="col-lg-3">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        {{-- <h4>Contact Page Banner</h4> --}}
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            {{-- <h5>Existing Banner</h5> --}}
                        </div>
                        <div class="pt-4">
                            {{-- <h5>Change Banner</h5> --}}
                            <form action="{{ url('tools_post4') }}" method="POST">
                            @csrf

                            <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="t1">{{ $t1->text  ?? ''}}</textarea>

                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        {{-- <h4>Career Page Banner</h4> --}}
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            {{-- <h5>Existing Banner</h5> --}}
                        </div>
                        <div class="pt-4">
                            {{-- <h5>Change Banner</h5> --}}
                            <form action="{{ url('tools_post5') }}" method="POST">
                            @csrf
                        <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="t2">{{$t2->text ?? ''}}
                        </textarea>


                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        {{-- <h4>Project Page Banner</h4> --}}
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            {{-- <h5>Existing Banner</h5> --}}
                        </div>
                        <div class="pt-4">
                            {{-- <h5>Change Banner</h5> --}}
                            <form action="{{ url("tools_post6") }}" method="POST">
                            @csrf


                            <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="t3">{{$t3->text ?? ''}}</textarea>
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
