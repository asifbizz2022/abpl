<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File; 
use Response;
class CategoryController extends Controller
{
    public function index(){
        $data = DB::table('project_categories')->orderBy('display_order', 'ASC')->get();
        $count = count($data);
        return view('admin.category.category', compact('data', 'count' ));
    }

    public function form_category($id = null){ 
        $status  = [
            'Active'=>'Active',
            'Inactive'=>'Inactive',
        ];

        $order = [
            1=>1,
             2=>2,
              3=>3,
               4=>4,
                5=>5,
                6=>6,
                7=>7,
        ];

        if($id){
            $update = 'update';
            $data = DB::table('project_categories')->where('id', $id)->first();
            return view('admin.category.form', compact('update','data','status', 'order')); 
        } else { 
            return view('admin.category.form' ,compact('status', 'order') );  
        }
        
    }
    public function add_update_category(Request $request){

        $request->validate([
             'name'=>'required', 
             'status'=>'required',
             'order'=>'required', 
        ]);

        if($request->id){

            $oldimg = DB::table('project_categories')->where('id', $request->id)->first();

             if($request->has('image')){ 
                $path = public_path('category/' .$oldimg->image_url);

                if(File::exists($path)){
                    File::delete($path);
                }

                $file = $request->file('image');
                $filename = md5(time()).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('category'), $filename);

                $save = DB::table('project_categories')->where('id', $request->id)->update([
                    'name'=>$request->name, 
                    'description'=>$request->content, 
                    'image_url'=>$filename,
                    'is_active'=>$request->status,
                    'display_order'=>$request->order,
                ]); 
                
            } else {

                $save = DB::table('project_categories')->where('id', $request->id)->update([
                    'name'=>$request->name, 
                    'description'=>$request->content, 
                    'image_url'=>$oldimg->image_url,
                    'is_active'=>$request->status,
                    'display_order'=>$request->order,
                ]);  
            }
            return redirect('projects-category')->with('success', 'Record Updated Succssfully');
           
        } else { 

           if($request->has('image')){

            $file = $request->file('image');
            $filename = md5(time()).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('category'), $filename);

            $save = DB::table('project_categories')->insert([
                'name'=>$request->name, 
                'description'=>$request->content, 
                'image_url'=>$filename,
                'is_active'=>$request->status,
                'display_order'=>$request->order,
            ]);
             
            }
          return redirect('/projects-category')->with('success', 'Record Added Succssfully');  
             
        }

    }
    public function change_status($id, $flag){
          
        
        $data = DB::table('project_categories')->where('id', $id)->update([
            'status'=>$flag,
        ]);

        return redirect('/projects-category')->with('error', 'Status Changed Succssfully');
    }
    public function delete_category(Request $request){
        $id = $request->id;
         $oldimg = DB::table('project_categories')->where('id', $id)->first();
         $path = public_path('category/' .$oldimg->image_url);
                if(File::exists($path)){
                    File::delete($path);
            }
        $data = DB::table('project_categories')->where('id', $id)->delete();

        return redirect('/projects-category')->with('error', 'Record Deleted Succssfully');
    }
}
