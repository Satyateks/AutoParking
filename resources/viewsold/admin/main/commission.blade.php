@extends('components.admin.main')
@section('main-container')

<!-- ============= Home Section =============== -->
<section class="home">

    <div class="Container">
        <div class="row foot-tablerow">
            <h5>Commission page</h5>
            <div class="col-lg-10 maintable-column">
                <form action="{{ url('commission') }}" method="POST" data-parsley-validate>
                    @csrf
                        <h5>Commission</h5>
                        <input type="number" class="form-control"  name="commission" value="{{$commission->commission ?? '1'}}" placeholder="Admin Commission" required min="1">
                        <div class="add-btntest text-end mt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</section>
@endsection()
