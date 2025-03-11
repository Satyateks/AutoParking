<?php

namespace App\Http\Controllers;

use App\Models\AdminCommission;
use App\Models\Payout;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\recent_order;
use App\Models\Parkspace;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\Order;


class admin_controller extends Controller
{
    //




    public function contact_list_delete($id){
        DB::table('contacts')->where('id',$id)->delete();
        return redirect()->back()->with('msg','Delete successfully');
    }

    public function admin_index(){
        $data['all_user'] = User::where('type','user')->count();
        $data['all_parkspace'] = Parkspace::count();
        $data['all_booking'] = recent_order::where('status','booked')->count();
        $data['total_paking_owner']=DB::table('owner_user')->count();
        $data['all_order']=recent_order::get();
        $data['price']=DB::table('recent_order')->get()->reverse();
        $data['page']='total_paking';
        $data['page']='admin_index';
        return view('admin.main.admin_index',$data);
    }

    public function user_about_us(){

        $data['about']=DB::table('user_cms_head')->where('type','about')->first();
        $data['page']="user_about_us";
        return view('admin.head.about',$data);
    }

    public function user_about_post_us(Request $request,$id){
       // dd($request);
        DB::table('user_cms_head')->where('id',$id)->update([
                 'about'=>$request->about
        ]);
        return redirect()->back()->with('msg','Update successfully');
    }

    public function admin_how_to_works(){
        $data['how_it_work']=DB::table('user_cms_head')->where('type','how_it_work')->first();
        $data['page']='admin_how_to_works';
        return view('admin.head.how_to_works',$data);
    }

    public function how_to_works_post(Request $request,$id){
       // dd($request);
        DB::table('user_cms_head')->where('id',$id)->update([
                 'how_it_work'=>$request->how_it_work
        ]);
        return redirect()->back()->with('msg','Update successfully');
    }

    public function contact_form_list(){
        $data=DB::table('contacts')->get()->reverse();
        $page='contact_form_list';
      return view('admin.head.contact_form_list',['data'=>$data,'page'=>$page]);
    }

//footer

public function admin_terms_condition(){
   $data['terms']=DB::table('user_cms_head')->where('type','v1')->first();
   $data['page']='admin_terms_condition';
   return view('admin.foot.admin_terms_con',$data);
}


public function admin_privacy_policy(){
     $data['privacy']=DB::table('user_cms_head')->where('type','v3')->first();
     $data['page']='admin_privacy_policy';

    return view('admin.foot.admin_privacy_policy',$data);
}

public function admin_Refund_policy(){
    $data['refund']=DB::table('user_cms_head')->where('type','v2')->first();
    $data['page']= 'admin_Refund_policy';
    return view('admin.foot.admin_refund_policy',$data);
}

public function admin_blog(){
    $data['blog']=DB::table('user_cms_head')->where('type','v4')->first();
    $data['page']='admin_blog';
    return view('admin.foot.admin_blog',$data);
}

public function admin_career(){
    $data['career']=DB::table('user_cms_head')->where('type','v5')->first();
    $data['page']='admin_career';
    return view('admin.foot.admin_career',$data);
}

public function admin_media(){

    $data['media']=DB::table('user_cms_head')->where('type','v6')->first();
    $data['page'] = 'admin_media';
     return view('admin.foot.admin_media',$data);
}


public function footer_post(Request $request,$id){
    DB::table('user_cms_head')->where('id',$id)->update([
        'terms'=>$request->terms,
        'refund'=>$request->refund,
        'privacy'=>$request->privacy,
        'media'=>$request->media,
        'career'=>$request->career,
        'blog'=>$request->blog
        ,'file'=>$request->file
    ]);
    return redirect()->back()->with('msg','Update successfully');
}


public function master(){

    $data['media']=DB::table('user_cms_head')->where('type','v6')->first();
     return view('admin.main.master',$data);
}

public function master2(){

    $data['media']=DB::table('user_cms_head')->where('type','v6')->first();
     return view('admin.main.master2',$data);
}

public function master3(){

    $data['media']=DB::table('user_cms_head')->where('type','v6')->first();
     return view('admin.main.master3',$data);
}

public function admin_kyc($id) {
    $raushan = DB::table('kyc')->where('owner_user_id',$id)->get();
    $countries = []; // Initialize an array to store country names
    foreach ($raushan as $row) {
        $country = DB::table('countries')->where('id', $row->country)->first();
        if ($country) {
            $countries[] = $country->country_name;
        }
    }
    $data['page']='total_owner';
    return view('admin.main.admin_kyc', ['raushan' => $raushan, 'countries' => $countries],$data);
}

public function kyc_varification($id) {
    $kyc = DB::table('kyc')->where('id', $id)->first();
    $hello=DB::table('owner_user')->where('id',$kyc->owner_user_id)->first();
    if (!$kyc) {
        return redirect()->back()->with('error', 'KYC record not found.');
    }

    if($kyc->is_verify==0){
    DB::table('kyc')->where('id', $id)->update([
        'is_verify' => 1,
    ]);
}else{
    DB::table('kyc')->where('id', $id)->update([
        'is_verify' => 0,
    ]);
}

    $email = $hello->email; // Assuming the email is stored in a column named 'email'
    $name = $hello->name; // Assuming the owner's name is stored in a column named 'name'

    Mail::send('emails.kyc_verified', ['name' => $name], function ($message) use ($email, $name) {
        $message->to($email, $name)
                ->subject('KYC Verification Successful');
    });

    return redirect()->back()->with('msg', 'KYC verification successful.');
}





public function admin_bank_details(Request $request){
    //$posts = post::paginate(10);
    $raushan=DB::table('bank_details')->paginate(2);
    $data['page']="admin_bank_details";
     return view('admin.main.bank_details_admin',['raushan'=>$raushan],$data);
}


public function index(Request $request)
    {
        $employees = DB::table('bank_details')->orderBy('name', 'account')
            ->when(
                $request->date_from && $request->date_to,
                function (Builder $builder) use ($request) {
                    $builder->whereBetween(
                        DB::raw('DATE(created_at)'),
                        [
                            $request->date_from,
                            $request->date_to
                        ]
                    );
                }
            )->paginate(5);

        return view('employee.index', compact('employees', 'request'));
    }


    public function bank_details_edit(Request $request,$id){
//dd($request);
        $data=DB::table('bank_details')->where('id',$id)->update([
            'name'=>$request->name,
            'bank_name'=>$request->bank_name,
            'account'=>$request->account,
            'branch'=>$request->branch,
            'ifsc'=>$request->ifsc,
            'mobile'=>$request->phone
        ]);
        return redirect()->back()->with('msg','Update successfully');
    }


    public function bank_details_delete(Request $request,$id){
       // dd($request);
        $data=DB::table('bank_details')->where('id',$id)->delete();
        return redirect()->back()->with('msg','Bank details delete successfully');
                                                             }

     public function admin_login(){
        return view('admin.head.admin_login');
     }

     public function admin_login_post(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $user = User::where('email', $request->email)->where('type','admin')->first();
        $remember = $request->has('remember') ? true : false;
        if(Auth::attempt($data,$remember)){
            if(Auth::user()->type == "user" ){
                Auth::logout();
                return redirect('admin_login')->with('error',"'You'r not a Authenticated person" );
            }
            return redirect('admin_index')->with('msg','Successfully login');
          }else {
            if ($user) {
                return redirect('admin_index')->with('error', 'Please Check Email ID and Password');
            } else {
                return redirect('admin_index')->with('error', 'Email not found');
            }
        }
    }

     public function admin_logout(Request $request){
        Auth::Logout();
        return redirect('admin_index')->with('msg','Logout succsessfully');
    }


    public function admin_recent_order(){
        $data['all_order']=recent_order::get();
        return view('admin.main.admin_recent',$data);
    }


    public function total_paking(){
        // $data['total_paking'] = DB::table('parking_space')->get();
        $data['total_paking'] = DB::table('parking_space')
        ->get()->reverse();
        $countries = []; // Initialize an array to store country names
        foreach ($data['total_paking'] as $row) {
            $country = DB::table('countries')->where('id', $row->country)->first();
            if ($country) {
                $countries[] = $country->country_name;
            }
        }
        $data['page']='total_paking';
        return view('admin.main.total_parking_space', $data, ['countries' => $countries]);
    }


    public function total_user(){
        $data['total_paking']=DB::table('users')->where('type','user')->get();
        $data['page']="total_user";
        return view('admin.main.total_user',$data);
    }

    public function total_owner(){
        $data['total_paking_owner']=DB::table('owner_user')->get()->reverse();
        $data['page']='total_owner';
       return view('admin.main.total_owner',$data);
    }


    public function kyc_edit(Request $request, $id){
        if($request->isMethod('post')){
           //dd($request);
            $value1 = add_icon3($request);
            $value2 = add_icon91($request);
            if(!empty($value1) && empty($value2)) {
                // dd("1");
                $data = DB::table('kyc')->where('owner_user_id', $id)->update([
                    'adhar_front' => $value1,
                    'fname' => $request->value1,
                    'address' => $request->value2,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'zip_code' => $request->zip_code,
                     'unique_id'=>$request->sharedField
                ]);
                $message = "Adhar Front Image Updated Successfully.";
                return redirect()->back()->with('msg','KYC updated successfully.');
            }
            elseif(empty($value1) && !empty($value2)) {
                //dd('2');

                $data = DB::table('kyc')->where('owner_user_id', $id)->update([
                    'adhar_back' => $value2,
                    'fname' => $request->value1,
                    'address' => $request->value2,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'zip_code' => $request->zip_code,
                     'unique_id'=>$request->sharedField
                ]);
                $message = "Adhar Back Image Updated Successfully.";
                return redirect()->back()->with('msg','KYC updated successfully.');
            }
            elseif(empty($value2) && empty($value1) ) {
                //dd('3');
                $data = DB::table('kyc')->where('owner_user_id', $id)->update([
                    'fname' => $request->value1,
                    'address' => $request->value2,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'zip_code' => $request->zip_code,
                     'unique_id'=>$request->sharedField,
                ]);
                $message = "KYC Updated Successfully.";
            }else{
               // dd('4');
                $data = DB::table('kyc')->where('owner_user_id', $id)->update([
                    'adhar_front' => $value1,
                    'adhar_back' => $value2,
                    'fname' => $request->value1,
                    'address' => $request->value2,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'zip_code' => $request->zip_code,
                   'unique_id'=>$request->sharedField,
                ]);
                $message = "KYC Updated Successfully.";
            }

            // Redirect with message
            return redirect()->back()->with('msg','KYC updated successfully.');
        } else {
            $data=DB::table('kyc')->where('owner_user_id', $id)->first();
         //   $country=DB::table('country')->where('type','country')->get();
          $state=DB::table('states')->where('country_id','=',$data->country)->get();
         $countries = DB::table('tbl_countries')->get();
         $page='total_owner';
         return view('admin.main.kyc_edit', compact('state','data','countries','page'));
        }
    }


    public function total_user_edit1(request $request,$id){

        if($request->isMethod('post')){
            $data['data']=DB::table('users')->where('id',$id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
            ]);
            return redirect('total_user')->with('msg','Update successful');
        }else{
            $data['data']=DB::table('users')->where('id',$id)->first();
            $data['page']='total_user';
            return view('admin.main.total_user_edit',$data);

        }


    }

    public function total_owner_edit(request $request,$id){



        if($request->isMethod('post')){
            $data['data']=DB::table('owner_user')->where('id',$id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
            ]);
            return redirect('total_owner')->with('msg','Update Successful!');
        }else{
            $data['data']=DB::table('owner_user')->where('id',$id)->first();
            $data['page']='total_owner';
            return view('admin.main.total_owner_edit',$data);

        }

    }




public function total_user_edit1_post(Request $request, $id){

    $data = DB::table('owner_user')->where('id', $id)->first();
   // dd($data->is_verify);
    if($data->is_verify == 1){
        DB::table('owner_user')->where('id', $id)->update([
            'is_verify' => 0,
        ]);
    } else {
        DB::table('owner_user')->where('id', $id)->update([
            'is_verify' => 1,
        ]);
    }
    return redirect()->back();
}



//    public function total_user_edit1_post1(Request $request, $id){

// $data = DB::table('users')->where('id', $id)->first();
//    // dd($data->is_verify);
//     if($data->is_verify == 1){
//         DB::table('owner_user')->where('id', $id)->update([
//             'is_verify' => 0,
//         ]);
//     } else {
//         DB::table('owner_user')->where('id', $id)->update([
//             'is_verify' => 1,
//         ]);
//     }
//     return redirect()->back();

// }



public function total_user_edit1_post1(Request $request, $id){
    $data = DB::table('users')->where('id', $id)->first();
    if($data) {
        // Check if the property exists before accessing it
        if(property_exists($data, 'is_verify')) {
            // Toggle the value of is_verify
            $is_verify = $data->is_verify == 1 ? 0 : 1;
            DB::table('users')->where('id', $id)->update(['is_verify' => $is_verify]);
        } else {
            // Handle the case where is_verify property does not exist
            return redirect()->back()->with('error', 'is_verify property does not exist');
        }
    } else {
        // Handle the case where user with given ID is not found
        return redirect()->back()->with('error', 'User not found');
    }
    return redirect()->back()->with('success', 'Verification status updated successfully');
}


public function commission(Request $request){
    if($request->isMethod('post')){
        AdminCommission::where('id',1)->update([
            'commission'=>$request->commission,
        ]);
        return redirect()->back()->with('msg','Commission updated successFully');
    }else{
        $data['commission'] = AdminCommission::where('id',1)->first();
        $data['page']='commission';
        return view('admin.main.commission',$data);
    }
}

public function seller_booking(){
    $startDate = now()->subDays(15);

    $data['total_seller_amount'] = recent_order::with('owners')->select('order_id', DB::raw('SUM(order_price) as total_amount'))
    ->where('created_at', '>=', $startDate)
    ->groupBy('order_id')
    ->get();
    // dd()
    return view('admin.main.total_seller_amount',$data);

}


public function testimonial(){
    $data = DB::table('new_module')->first();
    return view('admin.main.testimonial', ['data' => $data]);
}

public function testimonial_post(Request $request){
    $value1 = add_icon36($request);
    dd($value1);
    //dd($request);
    DB::table('new_module')->insert([
        'images' => $value1,
        'text' => $request->input('about'),
    ]);

    // Redirect back or to any other page after successful submission
    return redirect()->back()->with('success', 'Testimonial submitted successfully!');
}

public function banner(){
    $data['m0']=DB::table('ucms')->where('type','m0')->first();
    $data['m1']=DB::table('ucms')->where('type','m1')->first();
    $data['m2']=DB::table('ucms')->where('type','m2')->first();
    $data['m3']=DB::table('ucms')->where('type','m3')->first();
    $data['page'] = "banner";
    return view('admin.main.banner',$data);
}


public function banner_post(Request $request){
    // Processing form submission
    if ($request->input('m0') == 'm0') {
        $value0 = add_icon37($request);
     //   dd($value0);
        //dd($value0);
        if ($value0 !== null) {
            DB::table('ucms')->where('type', 'm0')->update(['image' => $value0]);
        }
    }
    return redirect()->back();
}



public function banner_post1(Request $request){
    // Processing form submission
    if ($request->input('m1') == 'm1') {
        $value1 = add_icon38($request);
      // dd($value1);
        //dd($value0);
        if ($value1 !== null) {
            DB::table('ucms')->where('type', 'm1')->update(['image' => $value1]);
        }
    }
    return redirect()->back();
}


public function banner_post2(Request $request){
    // Processing form submission
    if ($request->input('m2') == 'm2') {
        $value2 = add_icon39($request);
      //  dd($value2);
        //dd($value0);
        if ($value2 !== null) {
            DB::table('ucms')->where('type', 'm2')->update(['image' => $value2]);
        }
    }
    return redirect()->back();
}


public function banner_post3(Request $request){
    // Processing form submission
    if ($request->input('m3') == 'm3') {
        $value3 = add_icon40($request);
        //dd($value3);
        //dd($value0);
        if ($value3 !== null) {
            DB::table('ucms')->where('type', 'm3')->update(['image' => $value3]);
        }
    }
    return redirect()->back();
}


public function tools(){
    $data['i1']=DB::table('ucms')->where('type','i1')->first();
    $data['i2']=DB::table('ucms')->where('type','i2')->first();
    $data['i3']=DB::table('ucms')->where('type','i3')->first();
    $data['t1']=DB::table('ucms')->where('type','t1')->first();
    $data['t2']=DB::table('ucms')->where('type','t2')->first();
    $data['t3']=DB::table('ucms')->where('type','t3')->first();
    $data['page']='tools';
    return view('admin.main.tools',$data);
}

public function tools_post1(Request $request){
    // if ($request->input('i1') == 'i1') {
        $value2 = add_icon42($request);
        // dd($request);
        // dd($value2);
        //dd($value0); $value2!=''
        if ($value2!='') {
            DB::table('ucms')->where('type', 'i1')->update(['image' => $value2]);
        }
    //}

    return redirect()->back();

}

public function tools_post2(Request $request){

   // if ($request->input('i2') == 'i2') {
        $value2 = add_icon43($request);
        //dd($value2);
        //dd($value0);
        if ($value2!='') {
            DB::table('ucms')->where('type', 'i2')->update(['image' => $value2]);
        }
   // }

    return redirect()->back();

}

public function tools_post3(Request $request){

    //if ($request->input('i3') == 'i3') {
        $value2 = add_icon44($request);
        //dd($value2);
        //dd($value0);
        if ($value2!='') {
            DB::table('ucms')->where('type', 'i3')->update(['image' => $value2]);
        }
   // }

    return redirect()->back();

}

public function tools_post4(Request $request){
    //dd($request);
    DB::table('ucms')->where('type', 't1')->update(['text' => $request->t1]);

    return redirect()->back();

}

public function tools_post5(Request $request){

   // dd($request);
    DB::table('ucms')->where('type', 't2')->update(['text' => $request->t2]);

    return redirect()->back();

}

public function tools_post6(Request $request){
 //dd($request);
    DB::table('ucms')->where('type', 't3')->update(['text' => $request->t3]);
    return redirect()->back();
}


public function tool2(){
     $data['t4']=DB::table('ucms')->where('type','t4')->first();
     $data['t5']=DB::table('ucms')->where('type','t5')->first();
     $data['t6']=DB::table('ucms')->where('type','t6')->first();
     $data['t7']=DB::table('ucms')->where('type','t7')->first();
     $data['t8']=DB::table('ucms')->where('type','t8')->first();
     $data['t9']=DB::table('ucms')->where('type','t9')->first();
     $data['t10']=DB::table('ucms')->where('type','t10')->first();
     $data['t50']=DB::table('ucms')->where('type','t50')->first();
     $data['t150']=DB::table('ucms')->where('type','t150')->first();
    $data['page']="tool2";
     //return $data;
     return view('admin.main.tool2',$data);
}




public function tool_post1(Request $request){
    DB::table('ucms')->where('type', 't4')->update(['text' => $request->t4]);
    return redirect()->back()->with('msg', 'Updated successfully');
}
public function tool_post2(Request $request){
    // dd($request); // Remove or comment out this line
    DB::table('ucms')->where('type', 't5')->update(['text' => $request->t5]);
    return redirect()->back()->with('msg','Update successfully');
}

public function tool_post3(Request $request){
    // dd($request); // Remove or comment out this line
    DB::table('ucms')->where('type', 't6')->update(['text' => $request->t6]);
    return redirect()->back()->with('msg','Update successfully');
}

public function tool_post4(Request $request){
    // dd($request); // Remove or comment out this line
    DB::table('ucms')->where('type', 't7')->update(['text' => $request->t7]);
    return redirect()->back()->with('msg','Update successfully');
}

public function tool_post5(Request $request){
    // dd($request); // Remove or comment out this line
    DB::table('ucms')->where('type', 't8')->update(['text' => $request->t8]);
    return redirect()->back()->with('msg','Update successfully');
}

public function tool_post150(Request $request){
    // dd($request); // Remove or comment out this line
    DB::table('ucms')->where('type', 't150')->update(['text' => $request->t150]);
    return redirect()->back()->with('msg','Update successfully');
}

public function tool_post7(Request $request){
    // dd($request); // Remove or comment out this line
    DB::table('ucms')->where('type', 't10')->update(['text' => $request->t10]);
    return redirect()->back()->with('msg','Update successfully');
}

public function tool_post420(Request $request){
    //dd($request);
    DB::table('ucms')->where('type', 't50')->update(['text' => $request->t50]);
    return redirect()->back()->with('msg','Update successfully');

}
public function owner_banner(){
    $data['oi1']=DB::table('ucms')->where('type','oi1')->first();
    $data['oi2']=DB::table('ucms')->where('type','oi2')->first();
    $data['oi3']=DB::table('ucms')->where('type','oi3')->first();
    $page="banner";
    return view('admin.main.owner_banner',$data);
}


public function owner_banner_post1(Request $request){
    if ($request->input('oi1') == 'oi1') {
        $value2 = add_icon48($request);
        //dd($value2);
        //dd($value0);
        if ($value2 !== null) {
            DB::table('ucms')->where('type', 'oi1')->update(['image' => $value2]);
        }
    }

    return redirect()->back();
}

public function owner_banner_post2(Request $request){

    if ($request->input('oi2') == 'oi2') {
        $value2 = add_icon49($request);
        //dd($value2);
        //dd($value0);
        if ($value2 !== null) {
            DB::table('ucms')->where('type', 'oi2')->update(['image' => $value2]);
        }
    }

    return redirect()->back();

}

public function owner_banner_post3(Request $request){

    if ($request->input('oi3') == 'oi3') {
        $value2 = add_icon50($request);
        //dd($value2);
        //dd($value0);
        if ($value2 !== null) {
            DB::table('ucms')->where('type', 'oi3')->update(['image' => $value2]);
        }
    }

    return redirect()->back();

}


public function otext(){
    $data['ot1']=DB::table('ucms')->where('type','ot1')->first();
    $data['ot2']=DB::table('ucms')->where('type','ot2')->first();
    $data['ot3']=DB::table('ucms')->where('type','ot3')->first();
    $data['ot4']=DB::table('ucms')->where('type','ot4')->first();
    $data['ot5']=DB::table('ucms')->where('type','ot5')->first();
    $data['ot6']=DB::table('ucms')->where('type','ot6')->first();
    $data['ot7']=DB::table('ucms')->where('type','ot7')->first();
    return view('admin.main.otext',$data);
}


public function otext_post1(Request $request){
    //dd($request);
    DB::table('ucms')->where('type', 'ot1')->update(['text' => $request->ot1]);
    return redirect()->back();
}


public function otext_post2(Request $request){
   // dd($request);
    DB::table('ucms')->where('type', 'ot2')->update(['text' => $request->ot2]);
    return redirect()->back();
}



public function otext_post3(Request $request){
   // dd($request);
    DB::table('ucms')->where('type', 'ot3')->update(['text' => $request->ot3]);
    return redirect()->back();
}


public function otext_post4(Request $request){
   // dd($request);
    DB::table('ucms')->where('type', 'ot4')->update(['text' => $request->ot4]);
    return redirect()->back();
}



public function otext_post5(Request $request){
    //dd($request);
    DB::table('ucms')->where('type', 'ot5')->update(['text' => $request->ot5]);
    return redirect()->back();
}


public function otext_post6(Request $request){
  //  dd($request);
    DB::table('ucms')->where('type', 'ot6')->update(['text' => $request->ot6]);
    return redirect()->back();
}


public function otext_post7(Request $request){
    //dd($request);
    DB::table('ucms')->where('type', 'ot7')->update(['text' => $request->ot7]);
    return redirect()->back();
}


public function pamen(){

    return view('admin.main.pamen');
}


public function pamen_post1(Request $request){
DB::table('ucms')->where('type', 'poi1')->first();
}


public function pamen_post2(Request $request){
    if ($request->input('oi3') == 'oi3') {
        $value2 = add_icon50($request);
        //dd($value2);
        //dd($value0);
        if ($value2 !== null) {
            DB::table('ucms')->where('type', 'oi3')->update(['image' => $value2]);
        }
    }
    return redirect()->back();
    }


    public function pamen_post3(Request $request){
        DB::table('ucms')->where('type', 'poi1')->first();
        }


        public function pamen_post4(Request $request){
            if ($request->input('oi3') == 'oi3') {
                $value2 = add_icon50($request);
                //dd($value2);
                //dd($value0);
                if ($value2 !== null) {
                    DB::table('ucms')->where('type', 'oi3')->update(['image' => $value2]);
                }
            }
            return redirect()->back();
            }


            public function pamen_post5(Request $request){
                DB::table('ucms')->where('type', 'poi1')->first();
                }


                public function pamen_post6(Request $request){
                    if ($request->input('oi3') == 'oi3') {
                        $value2 = add_icon50($request);
                        //dd($value2);
                        //dd($value0);
                        if ($value2 !== null) {
                            DB::table('ucms')->where('type', 'oi3')->update(['image' => $value2]);
                        }
                    }
                    return redirect()->back();
                    }


                    public function pamen_post7(Request $request){
                        DB::table('ucms')->where('type', 'poi1')->first();
                        }


                        public function pamen_post8(Request $request){
                            if ($request->input('oi3') == 'oi3') {
                                $value2 = add_icon50($request);
                                //dd($value2);
                                //dd($value0);
                                if ($value2 !== null) {
                                    DB::table('ucms')->where('type', 'oi3')->update(['image' => $value2]);
                                }
                            }
                            return redirect()->back();
                            }


                            public function pamen_post9(Request $request){
                                DB::table('ucms')->where('type', 'poi1')->first();
                                }


   public function pamen_post10(Request $request){
    if ($request->input('oi3') == 'oi3') {
        $value2 = add_icon50($request);
        //dd($value2);
        //dd($value0);
        if ($value2 !== null) {
            DB::table('ucms')->where('type', 'oi3')->update(['image' => $value2]);
        }
    }
    return redirect()->back();
   }




public function index_payout()
{
    $payouts = Payout::all();
    $page='payouts';
    return view('admin.main.payout', compact('payouts','page'));
}


public function generatePayouts()
{
    $currentDate = Carbon::now();
    $startDate = Carbon::now()->subDays(15);

    $orders = DB::table('recent_order')->whereBetween('order_date', [$startDate, $currentDate])->get();

    $groupedOrders = $orders->groupBy('owner_id');

    // Calculate total amount for each owner
    $payouts = [];
    foreach ($groupedOrders as $ownerId => $ownerOrders) {
        $totalAmount = $ownerOrders->sum('order_price');

        // Create a payout record
        $payouts[] = [
            'owner_id' => $ownerId,
            'total_amount' => $totalAmount,
            'paid' => false, // Assuming payouts are not paid initially
            // You can add more fields like payout date, status, etc. if needed
        ];
    }

    // Save payouts to the database
    Payout::insert($payouts);
}








   public function owner_parking($id) {
    $owner = DB::table('parking_space')->where('owner_id', $id)->get()->reverse();
    // $countries = [];
    // if ($owner->isNotEmpty()) {
    //     foreach ($owner as $row) {
    //         $country = DB::table('countries')->where('id', $row->country)->first();
    //        // dd($country);
    //         if ($country) {
    //             $countries[] = $country->country_name;
    //         }
    //     }
    $data['page']='total_owner';
        return view('admin.main.owner_parking', ['owner' => $owner],$data);
    // } else {
    //     return redirect()->back()->with('error', 'No parking spaces found for this owner.');
    // }
}

// public function admin_kyc() {
//     $raushan = DB::table('kyc')->get();
//     $countries = []; // Initialize an array to store country names
//     foreach ($raushan as $row) {
//         $country = DB::table('countries')->where('id', $row->country)->first();
//         if ($country) {
//             $countries[] = $country->country_name;
//         }
//     }
//     return view('admin.main.admin_kyc', ['raushan' => $raushan, 'countries' => $countries]);
//     //return $country->country_name;
// }



   public function parking_verify($id){
      $data=DB::table('parking_space')->where('id',$id)->first();
      //return $data->is_verify;
      if($data->is_verify == 1){
        DB::table('parking_space')->where('id',$id)->update([
            "is_verify"=>"0",
        ]);
      }else{
        DB::table('parking_space')->where('id',$id)->update([
            "is_verify"=>"1",
        ]);
      }
      return back();
   }


   public function listing_details(Request $request){
    if($request->isMethod('post')){
        //dd($request);
        if(DB::table('listing')->exists()){
            DB::table('listing')->update([
                'value1'=>$request->value1,
                'value2'=>$request->value2,
                'value3'=>$request->value3,
            ]);
         return redirect()->back()->with("msg","Details Updated Successfully");
        }else{
            DB::table('listing')->insert([
                'value1'=>$request->value1,
                'value2'=>$request->value2,
                'value3'=>$request->value3,
            ]);
         return redirect()->back()->with("msg","Details Added Successfully");
        }

    }else{
        $data['data']=DB::table('listing')->first();
        $data['page']='listing_details';
        return view('admin.main.listing',$data);
    }
   }

   public function bank_details_view_view($id){
    $data['data']=DB::table('bank_details')->where('id',$id)->get();
    //return $data;
    $data['page']='admin_bank_details';
    return view('admin.main.admin_bank_details', $data);
   }



   public function admin_parking_edit(Request $request,$id){


    if($request->isMethod('post')){
       // dd($request);
        $value1=add_icon99($request);
        if($value1!=''){

         $data=DB::table('parking_space')->where('id',$id)->update(
             [
             'image'=>$value1,
             'zip_code'=>$request->value1,
             'type_of_space'=>$request->type_of_space,
             'vehicle_type'=>$request->flexRadioDisabled,
             'vahicle_charge'=>$request->flexRadioDisabled1,
             'vaicle_share'=>$request->flexRadioDisabled2,
             'booking_want'=>$request->name,
             'country'=>$request->country,
             'address'=>$request->address,
             'hourly'=>$request->hour,
             'daily'=>$request->daily,
             'weekly'=>$request->weekly,
             'monthly'=>$request->monthly,
             'description'=>$request->description,
             'lat'=>$request->lat,
             'lng'=>$request->lng,
             'state'=>$request->state,
            'city'=>$request->city,
             ]
            );
            return redirect()->back()->with('msg','Parking space image updated successfully');
        }else{

         $id=DB::table('parking_space')->where('id',$id)->update(
             [
             'zip_code'=>$request->value1,
             'type_of_space'=>$request->type_of_space,
             'vehicle_type'=>$request->flexRadioDisabled,
             'vahicle_charge'=>$request->flexRadioDisabled1,
             'vaicle_share'=>$request->flexRadioDisabled2,
             'booking_want'=>$request->name,
             'country'=>$request->country,
             'address'=>$request->address,
             'hourly'=>$request->hour,
             'daily'=>$request->daily,
             'weekly'=>$request->weekly,
             'monthly'=>$request->monthly,
             'description'=>$request->description,
             'lat'=>$request->lat,
             'lng'=>$request->lng,
             'state'=>$request->state,
            'city'=>$request->city,

             ]
            );
            return redirect()->back()->with('msg','Parking update successfully.');
        }

     }else{
        $all=DB::table('space_type')->get();
        $data=DB::table('parking_space')->where('id', $id)->first();
      $state=DB::table('states')->where('country_id','=',$data->country)->get();
     $hello=DB::table('countries')->get();
     $all=DB::table('space_type')->get();
     $id=DB::table('parking_space')->where('id',$id)->first();
     $countries = DB::table('tbl_countries')->get();
    $page='total_paking';
   return view('admin.main.admin_parking_edit', compact('countries','all','hello','id','page','state','data'));
    }

   }


   public function email_phone(){
       $data=DB::table('summit')->get()->reverse();
       $page='email_phone';
       return view('admin.cms.email_phone',compact('data','page'));
   }

   public function email_delete_phone($id){
        $data=DB::table('summit')->where('id',$id)->delete();
        return redirect()->back()->with('msg','Delete successfully');
   }


   public function user_delete_user($id){
           DB::table('users')->where('id',$id)->delete();
           return redirect()->back()->with('msg','Delete successfully');
   }
   public function isActive($id){
        if(DB::table('users')->where('id',$id)->value('isactive')==1) {
            DB::table('users')->where('id', $id)->update(['isactive' => 0]);
        } else {
            DB::table('users')->where('id', $id)->update(['isactive' => 1]);
        }
        return redirect()->back()->with('msg','Update Successfully');
        }

        public function owner_owner_delete($id){
            DB::table('owner_user')->where('id',$id)->delete();
            return redirect()->back()->with('msg','Delete successfully');
        }

        public function parking_delete($id){
            DB::table('parking_space')->where('id',$id)->delete();
            return redirect()->back()->with('msg','Delete successfully');
        }

        public function admin_kyc_delete($id){
              DB::table('kyc')->where('id', $id)->delete();
              return redirect()->back()->with('msg', 'KYC deleted successfully!');
        }

}
