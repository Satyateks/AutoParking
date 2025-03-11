
@extends('components.owner.main')

@section('main-container')

<!-- Include Parsley.js from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

    <div class="container pt-4 pb-4">
        <div  class="row get-paid-row justify-content-center">
            <div class="col-lg-5">
                <div class="get-paid-box">
                    <center><h5 class="center">Bank Details</h5></center>


                    <form class="row pt-1" action="{{ url('bank_details_post') }}" method="POST" data-parsley-validate>
                        @csrf
                        <div class="col-12 mb-4">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" name="bank_name" class="form-control" placeholder="Bank Name" value="{{ $data->bank_name ?? '' }}" required maxlength="26" data-parsley-trigger="change" data-parsley-whitespace="squish">
                        </div>
                        <div class="col-12 mb-4">
                            <label for="name">Account Holder Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Account holder name" value="{{ $data->name ?? '' }}" required maxlength="26" minlength="9" data-parsley-trigger="change" data-parsley-whitespace="squish">
                        </div>
                        <div class="col-12 mb-4">
                            <label for="account">Account Number</label>
                            <input type="number" name="account" class="form-control" placeholder="Enter your account number" value="{{ $data->account ?? '' }}" required maxlength="16" minlength="9" data-parsley-trigger="change">
                        </div>
                        <div class="col-6 mb-4">
                            <label for="branch">Branch</label>
                            <input type="text" name="branch" class="form-control" placeholder="Branch name" value="{{ $data->branch ?? '' }}" required maxlength="30" minlength="2" data-parsley-trigger="change" data-parsley-whitespace="squish">
                        </div>
                        <div class="col-6 mb-4">
                            <label for="ifsc">IFSC</label>
                            <input type="text" name="ifsc" class="form-control" placeholder="IFSC" value="{{ $data->ifsc ?? '' }}" required maxlength="15" minlength="6" data-parsley-trigger="change" data-parsley-whitespace="squish">
                        </div>
                        <div class="col-12 mb-4">
                            <label for="mobile">Mobile</label>
                            <input type="number" name="mobile" class="form-control" placeholder="Enter your phone number" value="{{ $data->mobile ?? '' }}" required maxlength="15" minlength="7" data-parsley-trigger="change">
                        </div>
                        <div class="col-lg-12 bank-btn pt-4">
                            <button type="submit" class="btn btn-primary">Verify Bank Account</button>
                        </div>
                    </form>


{{--
                        <form class="row pt-1"  action="{{url('bank_details_post')}}" method="POST" data-parsley-validate>
                            @csrf
                            <div class="col-12 mb-4">
                                <label for="">Bank Name</label>
                                <input type="text" name="bank_name" class="form-control" placeholder="Bank Name" value="{{ $data->bank_name ?? '' }}" required maxlength="26">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="">Account Holder Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Account holder name" value="{{ $data->name ?? '' }}" required maxlength="26">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="">Account Number</label>
                                <input type="NUMBER" name="account" class="form-control" placeholder="Enter your account number" value="{{ $data->account ?? '' }}" required maxlength="16">
                            </div>
                            <div class="col-6 mb-4">
                                <label for="">Branch</label>
                                <input type="text" name="branch" class="form-control" placeholder="Branch name" value="{{ $data->branch ?? ''}}" required maxlength="30">
                            </div>
                            <div class="col-6 mb-4">
                                <label for="">IFSC</label>
                                <input type="text" name="ifsc" class="form-control" placeholder="IFSC" value="{{ $data->ifsc ?? ''}}" required maxlength="15">
                            </div>

                            <div class="col-12 mb-4">
                                <label for="">Mobile </label>
                                <input type="NUMBER" name="mobile" class="form-control" placeholder="Enter your phone number" value="{{ $data->mobile ?? ''}}" required maxlength="10" minlength="10">
                            </div>

                            <div class="col-lg-12 bank-btn pt-4">
                                <button type="submit" class="btn btn-primary" >Verify Bank Account</button>
                            </div>

                        </form> --}}
                </div>
            </div>
        </div>
    </div>


@endsection()
