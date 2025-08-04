<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB; use File;
class BannersController extends Controller
{
    public function index(){
         $data = DB::table('banners')->get();
         return view('admin.banners.banners', compact('data'));
    }
    public function form($id = null){
        $status  = [
            1=>'Active',
            0=>'Inactive',
        ];
        $order = [
            1=>1,
             2=>2,
              3=>3,
               4=>4,
                5=>5,
        ];

         if($id){
            $update = 'update';
            $data = DB::table('banners')->where('id', $id)->first();
            return view('admin.banners.add-update-form', compact('update', 'data', 'status','order'));
         } else {
            return view('admin.banners.add-update-form', compact('status','order'));
         }
    }
    public function add_update(Request $request){

        $request->validate([
            'title'=>'required',
             'subtitle'=>'required',
            'is_active'=>'required',
            'order'=>'required',
        ]);
       
        $id = $request->id; 

        if($request->id){
            $oldimg = DB::table('banners')->where('id', $request->id)->first();
            if($request->has('image')){
                
                $path = public_path('banners/'.$oldimg->banner);
                
                if(File::exists($path)){
                    File::delete($path);
                }

                $file = $request->file('image');
                $filename = md5(time()).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('banners'), $filename);

                $save = DB::table('banners')->where('id', $id)->update([
                    'display_order'=>$request->order,
                    'title'=>$request->title,
                     'subtitle'=>$request->subtitle,
                    'banner'=>$filename,
                    'is_active'=>$request->is_active,
                ]); 
             } else { 
                $save = DB::table('banners')->where('id', $id)->update([
                    'display_order'=>$request->order,
                    'title'=>$request->title,
                      'subtitle'=>$request->subtitle,
                    'banner'=>$oldimg->banner,
                    'is_active'=>$request->is_active,
                ]); 
             }
             
                return redirect('banners')->with('success', 'Banner Updated Succssfully');
            
        }
        else {
            //adding
            if($request->has('image')){
                $file = $request->file('image');
                $filename = md5(time()).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('banners'), $filename);

                $save = DB::table('banners')->insert([ 
                    'display_order'=>$request->order,
                    'title'=>$request->title,
                      'subtitle'=>$request->subtitle,
                    'banner'=>$filename,
                    'is_active'=>$request->is_active,
                ]);
                if($save){
                    return redirect('banners')->with('success', 'Banner Added Succssfully');
                }
             }
        }
         
        
    }
    public function delete(Request $request){
        $id = $request->id;
         $oldimg = DB::table('banners')->where('id', $id)->first();
         $path = public_path('banners/' .$oldimg->banner);
                if(File::exists($path)){
                    File::delete($path);
            }
        $delete = DB::table('banners')->where('id', $id)->delete();
        if($delete){
            return redirect('banners')->with('error', 'Banner Deleted Succssfully');
        }
    }

}
