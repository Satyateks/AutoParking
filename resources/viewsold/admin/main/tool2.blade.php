@extends('components.admin.main')
@section('main-container')
<section class="home">

    <div class="toggle-sidebar" style="display: none;">
        <i class='bx bx-menu'></i>
    </div>

    <div class="Container">

        <div class="row dashboard-row">
            <div class="col-lg-10">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Home page</h4>
                    </div>
                    <div class="logo-insidebox">

                        <div class="pt-4">
                            <h5>Heading text</h5>
                            <form action="{{ url('tool_post1')}}" method="POST">
                            @csrf
                            <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="t4">{{ $t4->text  ?? ''}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Home page</h4>
                    </div>
                    <div class="logo-insidebox">

                        <div class="pt-4">
                            <h5>About text</h5>
                            <form action="{{ url('tool_post2') }}" method="POST">
                            @csrf
                        <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="t5">{{$t5->text ?? ''}}
                        </textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Home page</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div class="pt-4">
                            <h5>Why choose us text</h5>
                            <form action="{{ url("tool_post3") }}" method="POST">
                            @csrf


                            <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="t6">{{$t6->text ?? ''}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row dashboard-row">
            <div class="col-lg-10">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Home page</h4>
                    </div>
                    <div class="logo-insidebox">

                        <div class="pt-4">
                            <h5>Our solution Of car parking services</h5>
                            <form action="{{ url('tool_post4') }}" method="POST">
                            @csrf
                        <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="t7">{{ $t7->text  ?? ''}}
                        </textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Home page</h4>
                    </div>
                    <div class="logo-insidebox">

                        <div class="pt-4">
                            <h5>What our customers say text</h5>
                            <form action="{{ url('tool_post5') }}" method="POST">
                            @csrf
                        <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="t8">{{$t8->text ?? ''}}
                        </textarea>


                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Home page</h4>
                    </div>
                    <div class="logo-insidebox">

                        <div class="pt-4">
                            <h5>Your all-in-one Parking slot</h5>
                            <form action="{{ url("tool_post150") }}" method="POST">
                            @csrf


                            <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="t150">{{$t150->text ?? ''}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>


            {{-- <div class="col-lg-10">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Home page</h4>
                    </div>
                    <div class="logo-insidebox">

                        <div class="pt-4">
                            <form action="{{ url("tool_post420") }}" method="POST">
                            @csrf
                            <textarea
                             class="form-control tinytext-area"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="t50">{{$t50->text ?? ''}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div> --}}


        </div>

    </div>

</section>
@endsection()
