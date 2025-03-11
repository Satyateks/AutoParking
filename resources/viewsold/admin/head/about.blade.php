@extends('components.admin.main')
@section('main-container')

<!-- ============= Home Section =============== -->
<section class="home">

    <div class="Container">
        <div class="row foot-tablerow">
            <h5>About Us Page</h5>
            <div class="col-lg-11 maintable-column">
                <form action="{{ url('user_about_post_us', $about->id) }}" method="POST" data-parsley-validate>
                    @csrf
                        {{-- <h5>Description</h5> --}}
                        <textarea class="form-control tinytext-area" rows="12" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="about"
                            placeholder="Refund Policy Description"
                            required data-parsley-whitespace="squish" >{{$about->about ?? ''}}</textarea>
                        <div class="add-btntest text-end mt-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</section>
@endsection()
