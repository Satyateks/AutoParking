<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class cms extends Controller
{
    public function ev_edit(Request $request){

        if($request->isMethod('post')){
            if($request->has('ev_text1')){
                DB::table('ucms')->where('type','ev_text1')->update([
                    'text' => $request->ev_text1
                ]);
                return redirect()->back()->with('msg', 'Successfully updated');
            } elseif($request->has('ev_text2')){
                DB::table('ucms')->where('type','ev_text2')->update([
                    'text' => $request->ev_text2
                ]);
                return redirect()->back()->with('msg', 'Successfully updated');
            } elseif($request->has('ev_text3')){
                DB::table('ucms')->where('type','ev_text3')->update([
                    'text' => $request->ev_text3
                ]);
                return redirect()->back()->with('msg', 'Successfully updated');
            } else {
                DB::table('ucms')->where('type','ev_text4')->update([
                    'text' => $request->ev_text4
                ]);
                return redirect()->back()->with('msg', 'Successfully updated');
            }
        } else {
            $cms1 = DB::table('ucms')->where('type','ev_text1')->first();
            $cms2 = DB::table('ucms')->where('type','ev_text2')->first();
            $cms3 = DB::table('ucms')->where('type','ev_text3')->first();
            $cms4 = DB::table('ucms')->where('type','ev_text4')->first();

            return view('admin.cms.ev_text', compact('cms1', 'cms2', 'cms3', 'cms4'));
        }
    }


    public function testimonials(){
        $collection['collection']=DB::table('testimonials')->get();
        $collection['page']="testimonials";
        return view('admin.cms.testimonials',$collection);
    }




    public function add_test(Request $request){
        $value1 = add_icon_raushan($request);
        if($request->isMethod('post')){
            // $validated = $request->validate([
            //     'photo' => 'required',
            //     'name' => 'required',
            //     'des'=>'required',
            //     'comment'=>'required'
            // ]);
            // if(!$validated){
                $data=DB::table('testimonials')->insert([
                    'photo'=>$value1,
                    'name'=>$request->name,
                    'des'=>$request->des,
                    'comment'=>$request->comment
                ]);
                return redirect('testimonials');
            // }else{
            //     return redirect()->back()->with('msg','Validation failed');
            // }

        }else{
            $data['page']='testimonials';
            return view('admin.cms.add-test',$data);
        }
    }

    public function add_edit(Request $request , $id) {
        if($request->isMethod('post')){
            $value1 = add_icon_raushan($request);
        if($value1!=''){
            DB::table('testimonials')->where('id',$id)->update(['photo'=>$value1]);
        }else{
            $data=DB::table('testimonials')->where('id',$id)->update([
                'name'=>$request->name,
                'des'=>$request->des,
                'comment'=>$request->comment,
            ]);
        }
        return redirect('testimonials');
        }else{
            $data['data']=DB::table('testimonials')->where('id',$id)->first();
            $data['page']='testimonials';
            return view('admin.cms.add_edit',$data);
        }
    }

    public function photo_edit(Request $request,$id){
        if($request->isMethod('post')){
            $value1 = add_icon_raushan($request);
               $data= DB::table('testimonials')->where('id',$id)->update([
                'photo'=>$value1
               ]);
        }else{

        }
     return redirect('testimonials');
    }

    public function  add_delete(Request $request,$id) {
        $data=DB::table('testimonials')->where('id',$id)->delete();
        return redirect('testimonials');
    }

    public function test_edit(){
        return view('admin.cms.test-edit');
    }


    public function add_cru(Request $request){
        $collection['collection']=DB::table('cru')->get();
        $collection['page']="add_cru";
         return view('admin.cms.add_cru',$collection);
    }

    public function add_cru_edit(Request $request ,$id ){
        if($request->isMethod('post')){
            $value1 = add_icon_raushan($request);
               $data= DB::table('cru')->where('id',$id)->update([
                'photo'=>$value1
               ]);
               return redirect('add_cru');
        }else{
            $data['data']=DB::table('cru')->where('id',$id)->first();
            $data['page']='add_cru';
               return view('admin.cms.add_cru_edit',$data);
        }
    }

    public function add_cru_test(Request $request){
        if($request->isMethod('post')){
            $value1 = add_icon_raushan($request);
            $data=DB::table('cru')->insert([
                'photo'=>$value1,
            ]);
            return redirect('add_cru');
        }else{
            $data['page']='add_cru';
           return view('admin.cms.add_cru_test',$data);
        }
    }

    public function add_cru_delete(Request $request , $id){
        $data=DB::table('cru')->where('id',$id)->delete();
        return redirect('add_cru')->with('msg','Delete successfully');
    }


    public function why_choose(Request$request) {
        if($request->isMethod('post')){
            //dd($request);

            $value1 = add_icon_raushan1($request);
            $value2 = add_icon_raushan2($request);
            $value3 = add_icon_raushan3($request);
            $value4 = add_icon_raushan4($request);
            if ($request->has('i1')) {
                DB::table('why_choose')->where('type','text1')->update([
                    'image'=>$value1,
                ]);
            } elseif ($request->has('i2')) {
                DB::table('why_choose')->where('type','text2')->update([
                    'image'=>$value2,
                ]);
            } elseif ($request->has('i3')) {
                DB::table('why_choose')->where('type','text3')->update([
                    'image'=>$value3,
                ]);
            }elseif($request->has('i4')){
                DB::table('why_choose')->where('type','text4')->update([
                    'image'=>$value4
                ]);
            }elseif ($request->has('t1')) {
                DB::table('why_choose')->where('type','text5')->update([
                    'text'=>$request->input('t1')
                ]);
            } elseif ($request->has('t2')) {
                DB::table('why_choose')->where('type','text6')->update([
                    'text'=>$request->input('t2'),
                ]);
            } elseif ($request->has('t3')) {
                DB::table('why_choose')->where('type','text7')->update([
                    'text'=>$request->input('t3'),
                ]);
            }elseif($request->t4){
                DB::table('why_choose')->where('type','text8')->update([
                    'text' => $request->t4
                ]);
            }

            // Redirect back or wherever appropriate after handling the form
            return redirect()->back()->with('success', 'Form submitted successfully!');

        }else{
            $data['data1'] = DB::table('why_choose')->where('type','text1')->first();
            $data['data2'] = DB::table('why_choose')->where('type','text2')->first();
            $data['data3'] = DB::table('why_choose')->where('type','text3')->first();
            $data['data4'] = DB::table('why_choose')->where('type','text4')->first();
            $data['data5'] = DB::table('why_choose')->where('type','text5')->first();
            $data['data6'] = DB::table('why_choose')->where('type','text6')->first();
            $data['data7'] = DB::table('why_choose')->where('type','text7')->first();
            $data['data8'] = DB::table('why_choose')->where('type','text8')->first();
            $data['page'] = "why_choose";
            return view('admin.why_choose.why_choose',$data,);
        }

    }


    public function why_choose_insert(){
        return view('admin.why_choose.why_choose_insert');
    }

    public function why_choose_update(){
        return view('admin.why_choose.why_choose_update');
    }


}
