@extends('components.admin.main ')

@section('main-container')


    <div class="home">
<div class="page-wrapper">
    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <!-- Begin Page Content -->
            <div class="">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    {{-- <h1 class="h3 mb-0 text-gray-800">Payouts</h1> --}}
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
            @if($message = Session::get('update'))
            <script>
                swal("Payout Status Updated Successfully!", "", "")
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
                    <h3 class="m-0 font-weight-bold text-primary">Payouts</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="example" width="100%" cellspacing="0">

                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Owner Name</th>
                                    <th>Owner Email</th>
                                    <th>Bookings</th>
                                    <th>Amount</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($payouts as $key => $value)
                                <tr>
                                   <td scope="row">{{$key+1}}</td>

                <td>
                <?php
                $data=DB::table('owner_user')->where('id','=',$value->owner_id)->first();
                ?>
                {{$data->name ?? ''}}
                </td>

                                   {{-- <td>{{$value->owner_name ?? ""}}</td> --}}
                                   {{-- <td>{{$value->owner_email ?? ""}}</td> --}}
                                   <td>
                                    <?php
                                       $data=DB::table('owner_user')->where('id','=',$value->owner_id)->first();
                                        ?>
                                    {{$data->email ?? ''}}
                                    </td>
                                    <td>{{$value->bookings}}</td>
                                    <td>{{$value->amount}}</td>
                                    {{-- <td>{{$value->start_date}}</td>
                                    <td>{{$value->end_date}}</td> --}}
                                    <td>{{ date('Y-m-d:h:m', strtotime($value->start_date)) }}</td>
                                    <td>{{ date('Y-m-d:h:m', strtotime($value->end_date)) }}</td>
                                    <td>
                                        {{$value->status}} @if($value->status == "Unpaid") <button type="button" class="btn btn-primary" onclick="window.location.href='{{route('payout_status',$value->id)}}';">Paid</button> @endif
                                    </td>
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
</div>
@endsection()

