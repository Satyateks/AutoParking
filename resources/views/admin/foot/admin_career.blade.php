@extends('components.admin.main')
@section('main-container')

<!-- ============= Home Section =============== -->
    <section class="home">
   <form action="{{ url('footer_post',$career->id) }}" method="POST">
@csrf
 <div class="mb-4">
    <h5>Careers</h5>
            {{-- <h5>Description</h5> --}}
            <textarea     class="form-control tinytext-area" rows="13" id="exampleInputEmail1"
                aria-describedby="emailHelp" name="career"
                placeholder="Refund Policy Description"
                required data-parsley-whitespace="squish">{{$career->career ?? ''}}</textarea>
           </div>
           {{-- <div class="mb-4">
            <h5>Upload File</h5>
            <input type="file" name="file" accept=".pdf, .doc, .docx, .xls, .xlsx">
        </div> --}}
           <button type="submit" class="btn btn-primary">Submit</button>
</form>


    </section>
@endsection()
