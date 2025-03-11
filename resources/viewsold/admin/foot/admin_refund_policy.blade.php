@extends('components.admin.main')
@section('main-container')

<!-- ============= Home Section =============== -->
    <section class="home">
   <form action="{{ url('footer_post',$refund->id) }}" method="POST">
@csrf
 <div class="mb-4">
    <h5>Refund Policy</h5>
            {{-- <h5>Description</h5> --}}
            <textarea     class="form-control tinytext-area" rows="14" id="exampleInputEmail1"
                aria-describedby="emailHelp" name="refund"
                placeholder="Refund Policy Description"
                required data-parsley-whitespace="squish">{{$refund->refund ?? ''}}</textarea>
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
</form>


    </section>
@endsection()
