<?php

use App\Http\Controllers\admin_controller;
use App\Http\Controllers\cms;
use App\Http\Controllers\dynmic_ratting;
use App\Http\Controllers\forgetController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\onwer_controller;
use App\Http\Controllers\user_controller;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user;
use App\Http\Controllers\login_controller;
use Illuminate\View\DynamicComponent;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//user login
// Route::match(['get','post'],'/',[user_controller::class,'index']);
Route::match(['get','post'],'date_time_post',[user_controller::class,'date_time_post']);
//Route::match(['get','post'],'index',[user_controller::class,'index']);
Route::match(['get','post'],'user_login',[user_controller::class,'user_login']);
Route::match(['get','post'],'user_login_post',[user_controller::class,'user_login_post']);
//user registration
Route::match(['get','post'],'user_registration',[user_controller::class,'user_registration']);
Route::match(['get','post'],'user_logout',[user_controller::class,'user_logout']);
Route::match(['get','post'],'otp',[user_controller::class,'otp']);
Route::match(['get','post'],'user_register_otp',[user_controller::class,'user_register_otp']);
Route::match(['get','post'],'otp_varification_page',[user_controller::class,'otp_varification_page']);
Route::match(['get','post'],'user_profile',[user_controller::class,'user_profile']);
//user password reset
Route::match(['get','post'],'password_update/{token}',[user_controller::class,'password_update']);
Route::match(['get','post'],'forgot_pass',[user_controller::class,'forgot_pass']);
Route::match(['get','post'],'password_update_posts',[user_controller::class,'password_update_posts'])->name('password_update_posts');
Route::match(['get','post'],'forgot_pass_post',[user_controller::class,'forgot_pass_post']);
Route::match(['get','post'],'listing',[user_controller::class,'listing']);
Route::match(['get','post'],'master_post',[user_controller::class,'master_post']);
Route::match(['get','post'],'user_register_otp_again',[user_controller::class,'user_register_otp_again']);

Route::post('resend_otp', [user_controller::class, 'resend_otp'])->name('resend_otp');



Route::middleware(['User'])->group(function(){

//head section
Route::match(['GET', 'POST'], 'vahicle_number_add111', [user_controller::class, 'vahicle_number_add111'])->name('vahicle_number_add111');
Route::match(['GET', 'POST'], 'booking', [user_controller::class, 'booking']);

Route::match(['get','post'],'user_recent_order',[user_controller::class,'recent_order']);
Route::get('/reserve-parking/{id}', [user_controller::class, 'reserveParking'])->name('space_details/{id}');
//foot section
Route::get('/handle-backward-navigation', [user_controller::class, 'handleBackwardNavigation'])->name('handle.backward.navigation');

// Route::match(['get','post'],'space_details/{id}',[user_controller::class,'space_details']);
Route::match(['get', 'post'], '/space_details/{id}', [user_controller::class, 'space_details'])->name('space_details');


Route::match(['get','post'],'payment',[user_controller::class,'payment']);
Route::match(['get','post'],'user_payment/{id}',[user_controller::class,'user_payment']);
Route::match(['get','post'],'rating_parking_space',[user_controller::class,'rating_parking_space']);
Route::match(['get','post'],'rating_parking_direct',[user_controller::class,'rating_parking_direct']);

});

//onwer
Route::match(['get','post'],'space_owner',[onwer_controller::class,'space_onwer']);

Route::match(['get','post'],'owner_login',[onwer_controller::class,'owner_login']);
Route::match(['get','post'],'onwer_login_post',[onwer_controller::class,'onwer_login_post']);
//owner registration
Route::match(['get','post'],'onwer_registration',[onwer_controller ::class,'onwer_registration']);
Route::match(['get','post'],'owner_logout',[onwer_controller::class,'owner_logout']);
Route::match(['get','post'],'owner_otp',[onwer_controller::class,'owner_otp']);
Route::match(['get','post'],'onwer_register_otp',[onwer_controller::class,'onwer_register_otp']);
Route::match(['get','post'],'onwer_otp_varification_page',[onwer_controller::class,'onwer_otp_varification_page']);
Route::match(['get','post'],'onwer_profile',[onwer_controller::class,'onwer_profile']);
//onwe password reset

Route::match(['get','post'],'onwer_password_update/{token}',[onwer_controller::class,'onwer_password_update']);
Route::match(['get','post'],'onwer_forgot_pass',[onwer_controller::class,'onwer_forgot_pass']);
Route::match(['get','post'],'onwer_password_update_posts',[onwer_controller::class,'onwer_password_update_posts'])->name('password_update_posts');
Route::match(['get','post'],'owner_forgot_pass_post',[onwer_controller::class,'owner_forgot_pass_post']);
Route::middleware(['owner'])->group(function(){
//conteact

Route::match(['get','post'],'owner_recent_order',[onwer_controller::class,'owner_recent_order']);
Route::match(['get','post'],'kyc_data',[onwer_controller::class,'kyc_data']);

//ower footer section
Route::match(['get','post'],'rent_space_post',[onwer_controller::class,'rent_space_post']);
// routes/web.php

Route::match(['get','post'],'owner_payout',[onwer_controller::class,'owner_payout']);




//owner kyc
Route::match(['get','post'],'owner_kyc',[onwer_controller::class,'owner_kyc']);
Route::match(['get','post'],'kyc_post',[onwer_controller::class,'kyc_post']);

Route::middleware(['kyc'])->group(function(){
// Route::group(['middleware' => ['auth', 'kyc_verified']], function () {

Route::match(['get','post'],'rent_space',[onwer_controller::class,'rent_space']);
// Route::match(['get','post'],'rent_space',[onwer_controller::class,'rent_space']);
});

//owner bank details
Route::match(['get','post'],'bank_details',[onwer_controller::class,'bank_details']);
Route::match(['get','post'],'bank_details_post',[onwer_controller::class,'bank_details_post']);
Route::get('raushan_details',[onwer_controller::class,'raushan_details']);

});


//admin section
Route::match(['get','post'],'admin_login',[admin_controller::class,'admin_login']);
Route::match(['get','post'],'admin_login_post',[admin_controller::class,'admin_login_post']);



Route::middleware(['Admin'])->group(function(){


Route::match(['get','post'],'admin_kyc_delete/{id}',[admin_controller::class,'admin_kyc_delete']);

    Route::match(['get','post'],'parking_delete/{id}',[admin_controller::class,'parking_delete'])->name("parking_delete");


    Route::match(['get','post'],'owner_owner_delete/{id}',[admin_controller::class,'owner_owner_delete']);

Route::match(['get','post'],'tool_post150',[admin_controller::class,'tool_post150']);


Route::match(['get','post'],'user_delete_user/{id}',[admin_controller::class,'user_delete_user']);
Route::match(['get','post'],'isActive/{id}',[admin_controller::class,'isActive']);

Route::match(['GET', 'POST'], 'why_choose', [cms::class, 'why_choose']);
Route::match(['GET', 'POST'], 'why_choose_insert', [cms::class, 'why_choose_insert']);
Route::match(['GET', 'POST'], 'why_choose_update', [cms::class, 'why_choose_update']);


Route::get('email_phone', [admin_controller::class, 'email_phone']);
Route::get('email_delete_phone/{id}', [admin_controller::class, 'email_delete_phone']);



Route::get('contact_list_delete/{id}', [admin_controller::class, 'contact_list_delete']);

Route::get('testimonial', [admin_controller::class, 'testimonial'])->name('testimonial_post');
Route::post('testimonial_post', [admin_controller::class, 'testimonial_post']);



Route::match(['GET', 'POST'], 'owner_parking/{id}', [admin_controller::class, 'owner_parking']);
Route::match(['GET', 'POST'], 'parking_verify/{id}', [admin_controller::class, 'parking_verify']);



    Route::match(['GET', 'POST'], 'bank_details_view_view/{id}', [admin_controller::class, 'bank_details_view_view']);

    Route::match(['get','post'],'tool_post420',[admin_controller::class,'tool_post420']);

    Route::match(['get','post'],'add_cru_delete/{id}',[cms::class,'add_cru_delete']);
    Route::match(['get','post'],'add_cru_test',[cms::class,'add_cru_test']);
    Route::match(['get','post'],'add_cru_edit/{id}',[cms::class,'add_cru_edit']);
    Route::match(['get','post'],'add_cru',[cms::class,'add_cru']);


Route::match(['get','post'],'add_delete/{id}',[cms::class,'add_delete']);
Route::match(['get','post'],'photo_edit/{id}',[cms::class,'photo_edit']);
Route::match(['get','post'],'add_edit/{id}',[cms::class,'add_edit']);
Route::match(['get','post'],'testimonials',[cms::class,'testimonials']);
Route::match(['get','post'],'add_test',[cms::class,'add_test']);
Route::match(['get','post'],'test_edit',[cms::class,'test_edit']);
Route::match(['get','post'],'tools_post1',[admin_controller::class,'tools_post1']);
Route::match(['get','post'],'tools_post2',[admin_controller::class,'tools_post2']);
Route::match(['get','post'],'tools_post3',[admin_controller::class,'tools_post3']);
Route::match(['get','post'],'tools_post4',[admin_controller::class,'tools_post4']);
Route::match(['get','post'],'tools_post5',[admin_controller::class,'tools_post5']);
Route::match(['get','post'],'tools_post6',[admin_controller::class,'tools_post6']);
Route::match(['get','post'],'tool2',[admin_controller::class,'tool2']);
// Route::match(['get','post'],'tool_post1',[admin_controller::class,'tool_post1']);
Route::match(['get','post'],'tool_post2',[admin_controller::class,'tool_post2']);
Route::match(['get','post'],'tool_post3',[admin_controller::class,'tool_post3']);
Route::match(['get','post'],'tool_post4',[admin_controller::class,'tool_post4']);
Route::match(['get','post'],'tool_post5',[admin_controller::class,'tool_post5']);
Route::match(['get','post'],'tool_post6',[admin_controller::class,'tool_post6']);
Route::match(['get','post'],'tool_post7',[admin_controller::class,'tool_post7']);
Route::match(['get','post'],'tool_post1',[admin_controller::class,'tool_post1']);



Route::match(['get','post'],'owner_banner',[admin_controller::class,'owner_banner']);
Route::match(['get','post'],'owner_banner_post1',[admin_controller::class,'owner_banner_post1']);
Route::match(['get','post'],'owner_banner_post2',[admin_controller::class,'owner_banner_post2']);
Route::match(['get','post'],'owner_banner_post3',[admin_controller::class,'owner_banner_post3']);

Route::match(['get','post'],'otext',[admin_controller::class,'otext']);

Route::match(['get','post'],'otext_post1',[admin_controller::class,'otext_post1']);
Route::match(['get','post'],'otext_post2',[admin_controller::class,'otext_post2']);
Route::match(['get','post'],'otext_post3',[admin_controller::class,'otext_post3']);
Route::match(['get','post'],'otext_post4',[admin_controller::class,'otext_post4']);
Route::match(['get','post'],'otext_post5',[admin_controller::class,'otext_post5']);
Route::match(['get','post'],'otext_post6',[admin_controller::class,'otext_post6']);
Route::match(['get','post'],'otext_post7',[admin_controller::class,'otext_post7']);
Route::match(['get','post'],'admin_parking_edit/{id}',[admin_controller::class,'admin_parking_edit']);


Route::match(['get','post'],'pamen',[admin_controller::class,'pamen']);
Route::match(['get','post'],'pamen_post1',[admin_controller::class,'pamen_post1']);
Route::match(['get','post'],'pamen_post2',[admin_controller::class,'pamen_post2']);
Route::match(['get','post'],'pamen_post3',[admin_controller::class,'pamen_post3']);
Route::match(['get','post'],'pamen_post4',[admin_controller::class,'pamen_post4']);
Route::match(['get','post'],'pamen_post5',[admin_controller::class,'pamen_post5']);
Route::match(['get','post'],'pamen_post6',[admin_controller::class,'pamen_post6']);
Route::match(['get','post'],'pamen_post7',[admin_controller::class,'pamen_post7']);
Route::match(['get','post'],'pamen_post8',[admin_controller::class,'pamen_post8']);
Route::match(['get','post'],'pamen_post9',[admin_controller::class,'pamen_post9']);
Route::match(['get','post'],'pamen_post10',[admin_controller::class,'pamen_post10']);


    Route::match(['get','post'],'kyc_edit/{id}',[admin_controller::class,'kyc_edit']);
    Route::match(['get','post'],'admin_logout',[admin_controller::class,'admin_logout']);
    Route::match(['get','post'],'total_paking',[admin_controller::class,'total_paking']);
    Route::match(['get','post'],'total_user',[admin_controller::class,'total_user']);
    Route::match(['get','post'],'total_user_edit1/{id}',[admin_controller::class,'total_user_edit1']);
    Route::match(['get','post'],'total_owner_edit/{id}',[admin_controller::class,'total_owner_edit']);
    Route::match(['get','post'],'total_user_edit1_post/{id}',[admin_controller::class,'total_user_edit1_post']);
    Route::match(['get','post'],'total_user_edit1_post1/{id}',[admin_controller::class,'total_user_edit1_post1']);


    Route::match(['get','post'],'commission',[admin_controller::class,'commission']);
    Route::match(['get','post'],'total_owner',[admin_controller::class,'total_owner']);
    Route::match(['get','post'],'total_user_edit/{id}',[admin_controller::class,'total_user_edit']);


    Route::match(['get','post'],'kyc_varification/{id}',[admin_controller::class,'kyc_varification']);



Route::match(['get','post'],'admin_index',[admin_controller::class,'admin_index']);
//header cms
Route::match(['get','post'],'user_about_us',[admin_controller::class,'user_about_us']);
Route::match(['get','post'],'user_about_post_us/{id}',[admin_controller::class,'user_about_post_us']);
Route::match(['get','post'],'admin_how_to_works',[admin_controller::class,'admin_how_to_works']);
Route::match(['get','post'],'how_to_works/{id}',[admin_controller::class,'how_to_works_post']);
Route::match(['get','post'],'contact_form_list',[admin_controller::class,'contact_form_list']);
//footer cms
Route::match(['get','post'],'admin_terms_condition',[admin_controller::class,'admin_terms_condition']);
Route::match(['get','post'],'admin_privacy_policy',[admin_controller::class,'admin_privacy_policy']);
Route::match(['get','post'],'admin_Refund_policy',[admin_controller::class,'admin_Refund_policy']);
Route::match(['get','post'],'admin_blog',[admin_controller::class,'admin_blog']);
Route::match(['get','post'],'admin_career',[admin_controller::class,'admin_career']);
Route::match(['get','post'],'admin_media',[admin_controller::class,'admin_media']);
Route::match(['get','post'],'footer_post/{id}',[admin_controller::class,'footer_post']);
Route::match(['get','post'],'admin_recent_order',[admin_controller::class,'admin_recent_order']);



Route::match(['get','post'],'master',[admin_controller::class,'master']);
Route::match(['get','post'],'master2',[admin_controller::class,'master2']);
Route::match(['get','post'],'master3',[admin_controller::class,'master3']);
Route::match(['get','post'],'admin_kyc/{id}',[admin_controller::class,'admin_kyc']);
Route::match(['get','post'],'admin_bank_details',[admin_controller::class,'admin_bank_details']);
//Route::match(['get','post'],'filter',[admin_controller::class,'filter']);
Route::match(['get','post'],'bank_details_edit/{id}',[admin_controller::class,'bank_details_edit']);
Route::match(['get','post'],'bank_details_delete/{id}',[admin_controller::class,'bank_details_delete']);
Route::match(['get','post'],'seller_booking',[admin_controller::class,'seller_booking']);


Route::match(['get','post'],'banner',[admin_controller::class,'banner']);
Route::match(['get','post'],'banner_post',[admin_controller::class,'banner_post']);
Route::match(['get','post'],'banner_post1',[admin_controller::class,'banner_post1']);
Route::match(['get','post'],'banner_post2',[admin_controller::class,'banner_post2']);
Route::match(['get','post'],'banner_post3',[admin_controller::class,'banner_post3']);
Route::match(['get','post'],'tools',[admin_controller::class,'tools']);
Route::match(['get','post'],'ev_edit',[cms::class,'ev_edit']);


});

Route::match(['GET', 'POST'], 'listing_details', [admin_controller::class, 'listing_details']);

Route::get('/', function () {

    // Check for search input
    if (request('search')) {
        $users = DB::table('parking_space')->where('address', 'like', '%' . request('search') . '%')->get();
    } else {
        $users = DB::table('parking_space')->get();
    }

    $m0 = DB::table('ucms')->where('type', 'm0')->first();
    $m1 = DB::table('ucms')->where('type', 'm1')->first();
    $m2 = DB::table('ucms')->where('type', 'm2')->first();
    $m3 = DB::table('ucms')->where('type', 'm3')->first();
    $t1 = DB::table('ucms')->where('type','t1')->first();
    $t2 = DB::table('ucms')->where('type','t2')->first();
    $t3 = DB::table('ucms')->where('type','t3')->first();
    $t4 = DB::table('ucms')->where('type', 't4')->first();
    $t5 = DB::table('ucms')->where('type', 't5')->first();
    $t6 = DB::table('ucms')->where('type', 't6')->first();
    $t7 = DB::table('ucms')->where('type', 't7')->first();
    // $t8 = DB::table('ucms')->where('type', 't8')->first();
    // $t9 = DB::table('ucms')->where('type', 't9')->first();
    // $t10 = DB::table('ucms')->where('type', 't10')->first();
   // $t8 = DB::table('ucms')->where('type', 't8')->first();
     $t8=DB::table('ucms')->where('type','t8')->first();
     $t9=DB::table('ucms')->where('type','t9')->first();
     $t10=DB::table('ucms')->where('type','t10')->first();
     $oi1=DB::table('ucms')->where('type','oi1')->first();
     $oi2=DB::table('ucms')->where('type','oi2')->first();
     $oi3=DB::table('ucms')->where('type','oi3')->first();
     $i1=DB::table('ucms')->where('type','i1')->first();
     $i2=DB::table('ucms')->where('type','i2')->first();
     $i3=DB::table('ucms')->where('type','i3')->first();
     $t150=DB::table('ucms')->where('type','t150')->first();
     $testimonial=DB::table('testimonials')->get();
     $storage=DB::table('cru')->get();

           $data1= DB::table('why_choose')->where('type','text1')->first();
            $data2 = DB::table('why_choose')->where('type','text2')->first();
            $data3 = DB::table('why_choose')->where('type','text3')->first();
            $data4 = DB::table('why_choose')->where('type','text4')->first();
            $data5 = DB::table('why_choose')->where('type','text5')->first();
            $data6 = DB::table('why_choose')->where('type','text6')->first();
            $data7 = DB::table('why_choose')->where('type','text7')->first();
            $data8 = DB::table('why_choose')->where('type','text8')->first();

     // Pass both $users and $m0 to the view
   return view('user.main.index', compact('users','t150','t1','t2','t3','m0','m1', 'm2','m3', 't4','t5','t6','t7','t8','t9','t10','oi1','oi2','oi3','i1','i2','i3','storage','testimonial','data1','data2','data3','data4','data5','data6','data7','data8' ));
    //return $t8;
});

Route::get('/index', function () {

    // Check for search input
    if (request('search')) {
        $users = DB::table('parking_space')->where('address', 'like', '%' . request('search') . '%')->get();
    } else {
        $users = DB::table('parking_space')->get();
    }

    $m0 = DB::table('ucms')->where('type', 'm0')->first();
    $m1 = DB::table('ucms')->where('type', 'm1')->first();
    $m2 = DB::table('ucms')->where('type', 'm2')->first();
    $m3 = DB::table('ucms')->where('type', 'm3')->first();
    $t1 = DB::table('ucms')->where('type','t1')->first();
    $t2 = DB::table('ucms')->where('type','t2')->first();
    $t3 = DB::table('ucms')->where('type','t3')->first();
    $t4 = DB::table('ucms')->where('type', 't4')->first();
    $t5 = DB::table('ucms')->where('type', 't5')->first();
    $t6 = DB::table('ucms')->where('type', 't6')->first();
    $t7 = DB::table('ucms')->where('type', 't7')->first();
    // $t8 = DB::table('ucms')->where('type', 't8')->first();
    // $t9 = DB::table('ucms')->where('type', 't9')->first();
    // $t10 = DB::table('ucms')->where('type', 't10')->first();
   // $t8 = DB::table('ucms')->where('type', 't8')->first();
     $t8=DB::table('ucms')->where('type','t8')->first();
     $t9=DB::table('ucms')->where('type','t9')->first();
     $t10=DB::table('ucms')->where('type','t10')->first();
     $oi1=DB::table('ucms')->where('type','oi1')->first();
     $oi2=DB::table('ucms')->where('type','oi2')->first();
     $oi3=DB::table('ucms')->where('type','oi3')->first();
     $i1=DB::table('ucms')->where('type','i1')->first();
     $i2=DB::table('ucms')->where('type','i2')->first();
     $i3=DB::table('ucms')->where('type','i3')->first();
     $t150=DB::table('ucms')->where('type','t150')->first();
     $testimonial=DB::table('testimonials')->get();
     $storage=DB::table('cru')->get();

           $data1= DB::table('why_choose')->where('type','text1')->first();
            $data2 = DB::table('why_choose')->where('type','text2')->first();
            $data3 = DB::table('why_choose')->where('type','text3')->first();
            $data4 = DB::table('why_choose')->where('type','text4')->first();
            $data5 = DB::table('why_choose')->where('type','text5')->first();
            $data6 = DB::table('why_choose')->where('type','text6')->first();
            $data7 = DB::table('why_choose')->where('type','text7')->first();
            $data8 = DB::table('why_choose')->where('type','text8')->first();

     // Pass both $users and $m0 to the view
   return view('user.main.index', compact('users','t150','t1','t2','t3','m0','m1', 'm2','m3', 't4','t5','t6','t7','t8','t9','t10','oi1','oi2','oi3','i1','i2','i3','storage','testimonial','data1','data2','data3','data4','data5','data6','data7','data8' ));
    //return $t8;
});
//experiment
Route::get('/parking-spaces/search', [user_controller::class, 'search']);




// routes/web.php
use Illuminate\Support\Facades\Session;

Route::get('/update-session', function (\Illuminate\Http\Request $request) {
    $inputType = $request->input('inputType');
    $value = $request->input('value');

    // Update the session based on the input type
    Session::put($inputType, $value);

    return response()->json(['success' => true]);
});

Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe','stripe')->name('stripe.index');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});


Route::match(['get','post'],'contact',[user_controller::class,'contact']);
Route::match(['get','post'],'contact_post',[user_controller::class,'contact_post']);
Route::match(['get','post'],'user_about',[user_controller::class,'user_about']);
Route::match(['get','post'],'how_to_works',[user_controller::class,'how_to_works']);

Route::match(['get','post'],'owner_contact',[onwer_controller::class,'owner_contact']);
Route::match(['get','post'],'owner_contact_post',[onwer_controller::class,'owner_contact_post']);
//head sectin about page
Route::match(['get','post'],'owner_about',[onwer_controller::class,'owner_about']);
Route::match(['get','post'],'owner_how_to_works',[onwer_controller::class,'owner_how_to_works']);


Route::match(['get','post'],'tems_condition',[user_controller::class,'tems_condition']);
Route::match(['get','post'],'privacy_policy',[user_controller::class,'privacy_policy']);
Route::match(['get','post'],'refund_policy',[user_controller::class,'refund_policy']);
Route::match(['get','post'],'blog',[user_controller::class,'blog']);
Route::match(['get','post'],'career',[user_controller::class,'career']);
Route::match(['get','post'],'media',[user_controller::class,'media']);

Route::match(['get','post'],'owner_tems_condition',[onwer_controller::class,'owner_tems_condition']);
Route::match(['get','post'],'owner_privacy_policy',[onwer_controller::class,'owner_privacy_policy']);
Route::match(['get','post'],'owner_refund_policy',[onwer_controller::class,'owner_refund_policy']);
Route::match(['get','post'],'owner_blog',[onwer_controller::class,'owner_blog']);
Route::match(['get','post'],'owner_career',[onwer_controller::class,'owner_career']);
Route::match(['get','post'],'owner_media',[onwer_controller::class,'owner_media']);
Route::get('/get-location', [App\Http\Controllers\onwer_controller::class, 'getLocation'])->name('getLocation');


Route::match(['get','post'],'submitForm',[user_controller::class,'submitForm']);






Route::get('/payouts', [App\Http\Controllers\Payout_controller::class, 'payouts'])->name('payouts');
Route::get('/payout_status/{id?}', [App\Http\Controllers\Payout_controller::class, 'payout_status'])->name('payout_status');


Route::match(['get','post'],'query',[user_controller::class,'query']);

Route::match(['get','post'],'fetchContent',[user_controller::class,'fetchContent']);

Route::get('thank_you', function () {
    return view('thank_you');
});
Route::match(['GET', 'POST'], 'events', [onwer_controller::class, 'events']);


Route::match(['GET', 'POST'], 'pass_post', [login_controller::class, 'pass_post']);
Route::match(['GET', 'POST'], 'send_otp', [login_controller::class, 'send_otp']);
Route::match(['GET', 'POST'], 'otp_varify', [login_controller::class, 'otp_varify']);
Route::match(['GET', 'POST'], 'password_update', [login_controller::class, 'password_update']);
Route::match(['GET', 'POST'], 'otp_page', [login_controller::class, 'otp_page']);
Route::match(['GET', 'POST'], 'pass', [login_controller::class, 'pass']);
Route::match(['GET', 'POST'], 'uresend', [login_controller::class, 'uresend']);


Route::match(['GET', 'POST'], 'pass_post1', [login_controller::class, 'pass_post1']);
Route::match(['GET', 'POST'], 'send_otp1', [login_controller::class, 'send_otp1']);
Route::match(['GET', 'POST'], 'otp_varify1', [login_controller::class, 'otp_varify1']);
Route::match(['GET', 'POST'], 'password_update1', [login_controller::class, 'password_update1']);
Route::match(['GET', 'POST'], 'otp_page1', [login_controller::class, 'otp_page1']);
Route::match(['GET', 'POST'], 'pass1', [login_controller::class, 'pass1']);
Route::match(['GET', 'POST'], 'uresend1', [login_controller::class, 'uresend1']);
Route::match(['GET', 'POST'], 'owner_resend_otp', [onwer_controller::class, 'owner_resend_otp']);

Route::post('/get_states', [App\Http\Controllers\login_controller::class, 'get_states'])->name('get_states');


Route::match(['GET', 'POST'], 'parking_edit/{id}', [onwer_controller::class, 'parking_edit']);

Route::post('/get_cities', [login_controller::class, 'get_cities']);


//payouts


Route::match(['GET', 'POST'], 'ratting_dynamic/{id}', [dynmic_ratting::class, 'ratting_dynamic']);


