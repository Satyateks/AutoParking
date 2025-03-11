@extends('components.admin.main')
@section('main-container')

<!-- ============= Home Section =============== -->
<section class="home">
    <div class="Container">
        <div class="row foot-tablerow">
            <h5>How it work us page</h5>
                <div class="col-lg-11 maintable-column">
                    <form action="{{ url('how_to_works',$how_it_work->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            {{-- <h5>Description</h5> --}}
                            <textarea     class="form-control tinytext-area" rows="12" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="how_it_work"
                                placeholder="Refund Policy Description"
                                required data-parsley-whitespace="squish">{{$how_it_work->how_it_work ?? ''}}</textarea>
                        </div>
                        <button  type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
        </div>
    </div>
</section>
@endsection()
