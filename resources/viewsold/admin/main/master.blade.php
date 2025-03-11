@extends('components.admin.main')
@section('main-container')

<!-- ============= Home Section =============== -->
    <section class="home">
   <form action="{{ url('user_about_post_us',$about->id) }}" method="POST" enctype="multipart/form-data">
@csrf
 <div class="mb-4">
            <h5>Description</h5>
            <textarea     class="form-control tinytext-area" id="exampleInputEmail1"
                aria-describedby="emailHelp" name="about"
                placeholder="Refund Policy Description"
                required data-parsley-whitespace="squish">{{$about->about ?? ''}}</textarea>
           </div>
           <input type="file" name="image1" placeholder="image">
           <input type="submit">
</form>


    </section>
@endsection()
