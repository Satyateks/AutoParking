<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dynmic_ratting extends Controller
{



    public function ratting_dynamic(Request $request, $id)
    {
        //dd('dynamic');
        $data = DB::table('recent_order')->where('owner_id', $id)->get();
        $totalRating = 0;
        $count = 0;

        foreach ($data as $value) {
            $totalRating += $value->rating;
            $count++;
        }

        $averageRating = 0; // Initialize averageRating outside of the if-else block

        if ($count > 0) {
           // dd('hello');
            $averageRating = $totalRating / $count;
            $dataaa = DB::table('parking_space')->where('id', $id)->update([
                'final_rating' => $averageRating,
            ]);

        } else {
            //$averageRating = $totalRating / $count;
            $dataaa = DB::table('parking_space')->where('id', $id)->update([
                'final_rating' => $averageRating,
            ]);
        }


        return redirect('user_payment/' . $id);
    }



}
