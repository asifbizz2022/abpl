<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB; 
use File;
class NewsController extends Controller
{
    

    public function gallery(){
        $category = DB::table('project_categories')->get();
        $data = DB::table('gallery')->orderBy('display_order', 'ASC')->get();
        return view('admin.gallery.gallery', compact('data', 'category'));
    }
    public function gallery_form($id = null){
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

        $category = DB::table('project_categories')->get();
        
        if($id){
            $update = 1;
          
            $data = DB::table('gallery')->where('id', $id)->first();
            return view('admin.gallery.form', compact('data', 'update','status', 'order', 'category'));
        } else {

            $update = 0;
            return view('admin.gallery.form', compact('status', 'order', 'update', 'category'));
        }

    }
    public function add_photo(Request $request){

        $request->validate([
            'image.*'=>'required',  
        ]);

        $id = $request->id;
        $order = ($request->order) ? $request->order : 1;
        $status = $request->status;

        if($id){
            if($request->has('image')){
                $img = DB::table('gallery')->where('id', $id)->first();
                $path = public_path('gallery/'.$img->image);
                
                if(File::exists($path)){
                    File::delete($path);
                }
                $file = $request->image;
                $filename = md5(rand(111,000)).'.'.$file->extension();
                $file->move(public_path('gallery'), $filename); 
                DB::table('gallery')->where('id', $id)->update([
                    'image'=>$filename,
                    'display_order'=>$order,
                    'is_active'=>$status,
                    'category'=>$request->category,
                ]);
                
            } else {
                 
                DB::table('gallery')->where('id', $id)->update([
                     
                    'display_order'=>$order,
                    'is_active'=>$status,
                    'category'=>$request->category,
                ]);
                
            }
            
            return redirect('/gallery')->with('sucess', 'Record Updated Succssfully')   ;
        }
        else { 
            $file = $request->image;
            $filename  = md5(rand(111,000)).'.'.$file->extension();
            $file->move(public_path('gallery'), $filename);
                DB::table('gallery')->insert([
                    'image'=>$filename,
                    'display_order'=>$order,
                    'is_active'=>$status,
                     'category'=>$request->category,
                ]);
            
            return redirect('/gallery')->with('sucess', 'Record Added Succssfully')   ;
        } 

        
    }
    public function delete_gallery(Request $request){
        $id = $request->id; 
       
        $img = DB::table('gallery')->where('id', $id)->first();
        
           $path = public_path('gallery/'.$img->image);
                
                if(File::exists($path)){
                    File::delete($path);
                }
                  
         $data = DB::table('gallery')->where('id', $id)->delete();    
        
        if($data){
            return back()->with('error' , 'Record Deleted Succssfully');    
        }
        

    }
}
