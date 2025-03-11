<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Intervention\Image\Facades\Image;

// function add_icon(Request $request){
//     if ($request->hasFile('value1')) {
//         $file = $request->file('value1');

//         $extension = $file->getClientOriginalName();

//         $ext_array = explode(".",$extension);
//         $ext = end($ext_array);

//         $filename = time() . '.' . $extension;

//         $file->move('images_uploade/', $filename);
//         // dd($file);
//         // $image->image = $filename;
//         // dd($image);
//         return $filename;
//     }
// }


// function add_icon(Request $request){
//     if ($request->hasFile('value1')) {
//         $file = $request->file('value1');

//         // Use getClientOriginalExtension to get the file extension
//         $extension = $file->getClientOriginalExtension();

//         $filename = time() . '.' . $extension;

//         $file->move('images_uploaded/', $filename);

//         return $filename;
//     }
// }




function add_icon(Request $request){
    if ($request->hasFile('value2')) {
        $file = $request->file('value2');

        $extension = $file->getClientOriginalName();

        $ext_array = explode(".",$extension);
        $ext = end($ext_array);

        $filename = time() . '.' . $extension;

        $file->move('images_uploade/', $filename);
        // dd($file);
        // $image->image = $filename;
        // dd($image);
        return $filename;
    }
}



function add_icon3(Request $request){
    if ($request->hasFile('image1')) {
        $file = $request->file('image1');

        $extension = $file->getClientOriginalName();

        $ext_array = explode(".",$extension);
        $ext = end($ext_array);

        $filename = time() . '.' . $extension;

        $file->move('images_uploade/', $filename);
        // dd($file);
        // $image->image = $filename;
        // dd($image);
        return $filename;
    }
}

function add_icon91(Request $request){

    if ($request->hasFile('image2')) {
        $file = $request->file('image2');

        $extension = $file->getClientOriginalName();

        $ext_array = explode(".",$extension);
        $ext = end($ext_array);

        $filename = time() . '.' . $extension;

        $file->move('images_uploade/', $filename);
        // dd($file);
        // $image->image = $filename;
        // dd($image);
        return $filename;
    }
}


function add_icon99(Request $request){
    if ($request->hasFile('image')) {
        $file = $request->file('image');

        $extension = $file->getClientOriginalName();

        $ext_array = explode(".",$extension);
        $ext = end($ext_array);

        $filename = time() . '.' . $extension;

        $file->move('images_uploade/', $filename);
        // dd($file);
        // $image->image = $filename;
        // dd($image);
        return $filename;
    }
}



function add_icon36(Request $request){
    if ($request->hasFile('images')) {
        $file = $request->file('images');
        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploade/', $filename);
        return $filename;
    }
}


// function add_icon37(Request $request){

//     if ($request->hasFile('img0')) {
//         $file = $request->file('img0');

//         $extension = $file->getClientOriginalName();

//         $ext_array = explode(".",$extension);
//         $ext = end($ext_array);

//         $filename = time() . '.' . $extension;

//         $file->move('images_uploade/', $filename);
//         // dd($file);
//         // $image->image = $filename;
//         // dd($image);
//         return $filename;
//     }
// }


function add_icon37(Request $request){
    if ($request->hasFile('img0')) {
        $file = $request->file('img0');
        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploade/', $filename);
        return $filename;
    } else {
        return null;
    }
}

function add_icon38(Request $request){
    if ($request->hasFile('img1')) {
        $file = $request->file('img1');

        // Ensure the directory exists and is writable
        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploade/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}


function add_icon39(Request $request){
    if ($request->hasFile('img2')) {
        $file = $request->file('img2');

        // Ensure the directory exists and is writable
        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploade/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}


function add_icon40(Request $request){
    if ($request->hasFile('img3')) {
        $file = $request->file('img3');

        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploade/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}



function add_icon4(Request $request){
    if ($request->hasFile('image')) {
        $file = $request->file('image');

        $extension = $file->getClientOriginalName();

        $ext_array = explode(".",$extension);
        $ext = end($ext_array);

        $filename = time() . '.' . $extension;

        $file->move('images_uploade/', $filename);
        // dd($file);
        // $image->image = $filename;
        // dd($image);
        return $filename;
    }
}




function add_icon42(Request $request){
    if ($request->hasFile('i1')) {
        $file = $request->file('i1');

        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploade/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}



function add_icon43(Request $request){
    if ($request->hasFile('i2')) {
        $file = $request->file('i2');

        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploade/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}




function add_icon44(Request $request){
    if ($request->hasFile('i3')) {
        $file = $request->file('i3');

        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploade/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}



function add_icon45(Request $request){
    if ($request->hasFile('t1')) {
        $file = $request->file('t1');

        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploade/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}



function add_icon46(Request $request){
    if ($request->hasFile('t2')) {
        $file = $request->file('t2');

        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploade/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}



function add_icon47(Request $request){
    if ($request->hasFile('t3')) {
        $file = $request->file('t3');

        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploade/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}


function add_icon48(Request $request){
    if ($request->hasFile('oi1')) {
        $file = $request->file('oi1');

        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploade/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}



function add_icon49(Request $request){
    if ($request->hasFile('oi2')) {
        $file = $request->file('oi2');

        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploade/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}



function add_icon50(Request $request){
    if ($request->hasFile('oi3')) {
        $file = $request->file('oi3');

        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploade/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}

function add_icon_raushan(Request $request){
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploaded/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}

function add_icon_raushan1(Request $request){
    if ($request->hasFile('i1')) {
        $file = $request->file('i1');
        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploaded/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}


function add_icon_raushan2(Request $request){
    if ($request->hasFile('i2')) {
        $file = $request->file('i2');
        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploaded/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}



function add_icon_raushan3(Request $request){
    if ($request->hasFile('i3')) {
        $file = $request->file('i3');
        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploaded/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}


function add_icon_raushan4(Request $request){
    if ($request->hasFile('i4')) {
        $file = $request->file('i4');
        $extension = $file->getClientOriginalName();
        $ext_array = explode(".",$extension);
        $ext = end($ext_array);
        $filename = time() . '.' . $extension;
        $file->move('images_uploaded/', $filename);
        return $filename;
    } else {
        return null; // No file uploaded
    }
}







