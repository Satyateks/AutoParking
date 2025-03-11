<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class kyc
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
//     public function handle(Request $request, Closure $next): Response
//     {
//     //    $data=DB::table('kyc')->where([Auth::guard('owner')->user()->id,'owner_user_id'])->select('is_verify')->first();
//        $data = DB::table('kyc')
//     ->where('owner_user_id', Auth::guard('owner')->user()->id)
//     ->select('is_verify')
//     ->first();

//       // dd($data->is_verify);
//       if($data->is_verify==null){
//         if($data->is_verify==1){
//             return $next($request);
//           }else{
//             return redirect('owner_kyc')->with('msg','your kyc is panding , wait for approve');
//         }
//     }
//     return redirect('owner_kyc');
// }


public function handle(Request $request, Closure $next): Response
{
    $data = DB::table('kyc')
        ->where('owner_user_id', Auth::guard('owner')->user()->id)
        ->select('is_verify')
        ->first();


        $all = DB::table('kyc')
        ->where('owner_user_id', Auth::guard('owner')->user()->id)
        ->select('is_verify','fname','address','id','country','state','city',
        'zip_code',
        'adhar_front',
        'adhar_back',
        'owner_user_id')
        ->first();

    if ($all !== null ) {
        if ($data->is_verify == 1) {
            return $next($request);
        } else {
            return redirect('owner_kyc')->with('msg', 'Your KYC is pending, wait for approval');
        }
    } else {
        // Handle the case where owner_user_id is null
        return redirect('owner_kyc');
    }
}

}
