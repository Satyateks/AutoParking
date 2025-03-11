@extends('components.admin.main')
@section('main-container')

<!-- ============= Home Section =============== -->
    <section class="home">
   <form action="{{ url('footer_post',$privacy->id) }}" method="POST">
@csrf
 <div class="mb-4">
    <h5>Privacy Policy</h5>
            {{-- <h5>Description</h5> --}}
            <textarea     class="form-control tinytext-area" rows="12" id="exampleInputEmail1"
                aria-describedby="emailHelp" name="privacy"
                placeholder="Refund Policy Description"
                required data-parsley-whitespace="squish">{{$privacy->privacy ?? ''}}</textarea>
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
</form>
 </section>
@endsection()
