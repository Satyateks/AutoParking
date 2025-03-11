@extends('admin.layout.main')

@section('main-section')

<div class="page-wrapper">
    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <!-- Begin Page Content -->
            <div class="">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Payouts Management</h1>
                    {{-- <button id="add_new" type="button" class="btn btn-outline-info" onclick="document.getElementById('add_property_form').style.display='block';(this).style.display='none';document.getElementById('go_back').style.display='block';document.getElementById('property_details').style.display='none';">Add New</button>
                    <button id="go_back" style="display: none;" type="button" class="btn btn-outline-info" onclick="document.getElementById('add_property_form').style.display='none';(this).style.display='none';document.getElementById('add_new').style.display='block';document.getElementById('property_details').style.display='block';">Back</button> --}}
                </div>
            </div>
            <!-- /.container-fluid -->
            @if($message = Session::get('done'))
            <script>
                swal("Added Successfully!", "", "")
            </script>
            @endif
            @if($message = Session::get('status_updated'))
            <script>
                swal("Status updated successfully!", "", "")
            </script>
            @endif
            @if($message = Session::get('delete'))
            <script>
                swal("deleted successfully!", "", "")
            </script>
            @endif
            @if($message = Session::get('deactivated'))
            <script>
                swal("Deactivated Successfully!", "", "")
            </script>
            @endif
            @if($message = Session::get('activated'))
            <script>
                swal("Activated Successfully!", "", "")
            </script>
            @endif

            <div class="card shadow mb-4 mt-4" id="property_details">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-primary">Payouts Details</h3>
                </div>
                <div class="card-body py-2">
                    <button onclick="window.location.href = '{{ route('payouts_management') }}';" type="button" class="btn btn-info">All</button>
                    <button onclick="window.location.href = '{{ route('payouts_management', 'UnPaid') }}';" type="button" class="btn btn-primary">UnPaid</button>
                    <button onclick="window.location.href = '{{ route('payouts_management', 'Paid') }}';" type="button" class="btn btn-success">Paid</button>
                </div>

                <div class="card-body py-2">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Booking Id</th>
                                    <th>Amount</th>
                                    <th>Commission</th>
                                    <th>Payable</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($payments as $key => $payout)
                                <tr>
                                   <td scope="row">{{$key+1}}</td>
                                    <td>{{$payout->seller_name}}</td>
                                    <td>{{$payout->seller_email}}</td>
                                    <td>{{$payout->booking_id}}</td>
                                    <td>{{$payout->booking_amount}}</td>
                                    <td>{{$payout->admin_commission}}</td>
                                    <td>{{$payout->seller_pay}}</td>
                                    <td><a href="{{ route('update_payout_status', $payout->id) }}">{{$payout->status}}</a></td>
                                    <td>{{date('Y-m-d', strtotime($payout->created_at))}}</td>
                                    <td>
                                        <a href="{{ route('payouts_view', $payout->id)}}"><button class="btn btn-info px-2 py-1"><i class="fa fa-eye" style="display:inline;font-size:12px;" aria-hidden="true" title="View"></i></button></a>
                                        {{-- <a href="{{ route('properties_management', $payout->id)}}"><button class="btn btn-success px-2 py-1"><i class="fa fa-edit" style="display:inline;font-size:12px;" aria-hidden="true" title="Edit"></i></button></a> --}}
                                    <form method="POST" action="{{ url('delete_payouts' . '/' . $payout->id) }}" accept-charset="UTF-8" style="display:inline;padding:0px;margin:0px;top:0px;">
                                           @csrf
                                            <button type="submit" class="btn btn-danger px-2 py-1" title="Delete" onclick=""><i class="fa fa-trash" style="display:inline;font-size:12px;" aria-hidden="true" title="Delete"></i></button>
                                        </form></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
<script>
    $(document).ready(() => {
        $("#prop_type").on("change", function(){
            var property_type = $(this).val();
            if(property_type == "Rent"){
                $(".type_rent").css("display","flex");
                $(".type_rent").children('div').children('select').attr("required","true");
                $(".type_rent").children('div').children('input').attr("required","true");
                $(".type_sale").children('div').children('input').removeAttr("required");
                $(".type_sale").css("display","none");
            }
            else if(property_type == "Sale"){

                $(".type_rent").css("display","none");
                $(".type_rent").children('div').children('select').removeAttr("required");
                $(".type_rent").children('div').children('input').removeAttr("required");
                $(".type_sale").children('div').children('input').attr("required","true");
                $(".type_sale").css("display","flex");
            }
            else{
                $(".type_rent").css("display","none");
                $(".type_rent").children('div').children('select').removeAttr("required");
                $(".type_rent").children('div').children('input').removeAttr("required");
                $(".type_sale").children('div').children('input').removeAttr("required","true");
                $(".type_sale").css("display","none");
            }
        });
        $("#property_imgs").change(function () {
            const file = this.files.length;
            console.log(file);
            if (file>0) {
                if(file>12){
                    alert('You can only upload a maximum of 12 files')
                }
                else{
                    for(var i=0; i<file;i++){
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#property_imgs_preview").append("<img class='col-3' height='100px' src='"+event.target.result+"'>");
                            // console.log(event.target.result);
                        };
                        reader.readAsDataURL(this.files[i]);
                    }
                }
            }
        });
    });
</script>

   @endsection()
