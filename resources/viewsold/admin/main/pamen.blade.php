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
                        <h4>Contact Page Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                        </div>
                        <div class="pt-4">
                            <h5>Change Banner</h5>
                            <form action="{{ url('otext_post1')}}" method="POST">
                            @csrf
                            <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="ot1">{{ $ot1->text  ?? ''}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Career Page Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                        </div>
                        <div class="pt-4">
                            <h5>Change Banner</h5>
                            <form action="{{ url('otext_post2') }}" method="POST">
                            @csrf
                        <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="ot2">{{$ot2->text ?? ''}}
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
                        <h4>Project Page Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                        </div>
                        <div class="pt-4">
                            <h5>Change Banner</h5>
                            <form action="{{ url("otext_post3") }}" method="POST">
                            @csrf


                            <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="ot3">{{$ot3->text ?? ''}}</textarea>
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
                        <h4>Contact Page Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                        </div>
                        <div class="pt-4">
                            <h5>Change Banner</h5>
                            <form action="{{ url('otext_post4') }}" method="POST">
                            @csrf
                            <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="ot4">{{ $ot4->text  ?? ''}}</textarea>

                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Career Page Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                        </div>
                        <div class="pt-4">
                            <h5>Change Banner</h5>
                            <form action="{{ url('otext_post5') }}" method="POST">
                            @csrf
                        <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="ot5">{{$ot5->text ?? ''}}
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
                        <h4>Project Page Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                        </div>
                        <div class="pt-4">
                            <h5>Change Banner</h5>
                            <form action="{{ url("otext_post6") }}" method="POST">
                            @csrf
                            <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="ot6">{{$ot6->text ?? ''}}</textarea>
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
                        <h4>Contact Page Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                        </div>
                        <div class="pt-4">
                            <h5>Change Banner</h5>
                            <form action="{{ url('otext_post4') }}" method="POST">
                            @csrf
                            <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="ot4">{{ $ot4->text  ?? ''}}</textarea>

                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="banner-column">
                    <div class="head-boxbanner">
                        <h4>Career Page Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                        </div>
                        <div class="pt-4">
                            <h5>Change Banner</h5>
                            <form action="{{ url('otext_post5') }}" method="POST">
                            @csrf
                        <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="ot5">{{$ot5->text ?? ''}}
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
                        <h4>Project Page Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                        </div>
                        <div class="pt-4">
                            <h5>Change Banner</h5>
                            <form action="{{ url("otext_post6") }}" method="POST">
                            @csrf
                            <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="ot6">{{$ot6->text ?? ''}}</textarea>
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
                        <h4>Contact Page Banner</h4>
                    </div>
                    <div class="logo-insidebox">
                        <div>
                            <h5>Existing Banner</h5>
                        </div>
                        <div class="pt-4">
                            <h5>Change Banner</h5>
                            <form action="{{ url('otext_post4') }}" method="POST">
                            @csrf
                            <textarea
                             class="form-control tinytext-area" id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" name="ot4">{{ $ot4->text  ?? ''}}</textarea>

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
