<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Response;
use Storage;
class ProjectController extends Controller
{
    public function index(){
        
        $data = DB::table('projects')->get();
        return view('admin.projects.projects', compact('data'));
    }

    public function form($id = null){
        $status  = [
            1=>'Active',
            0=>'Inactive',
        ];
        $completed  = [
            'completed'=>'Completed',
            'not completed'=>'Not Completed',
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
            $update = 'update';
            $data = DB::table('projects')->where('id', $id)->first();
            return view('admin.projects.form', compact('update', 'data', 'status','order','category', 'completed'));
         } else {
            return view('admin.projects.form', compact('status','order','category', 'completed'));
         }
    }

    public function add_update(Request $request){
          //adding

          
        $request->validate([
            'title'=>'required',
            'location'=>'required',
            'completion_year'=>'required',
            'duration'=>'required',
        ]);
       
        $id = $request->id; 
        
        if($id){

            if($file = $request->has('image')){

                 
                $file = $request->file('image');
                        
                foreach(DB::table('project_images')->where('project_id', $id)->get() as $value ){
                     $path = public_path('projects/' .$value->image);
                        if(File::exists($path)){
                            File::delete($path);
                        }
                } 

                DB::table('project_images')->where('project_id', $id)->delete();

                foreach($file as $key=>$value){
                    $filename = md5(rand(111,000)).'.'.$value->extension();
                    $value->move(public_path('projects'), $filename);
                    DB::table('project_images')->insert(['project_id'=>$id, 'image' => $filename]);
                } 
                $save = DB::table('projects')->where('id', $request->id)->update([
                    'display_order'=>$request->order,
                    'title'=>$request->title,
                    'location'=>$request->location,
                    'duration'=>$request->duration,
                    'completion_year'=>$request->completion_year,
                    'category'=>$request->category,
                    'type'=>$request->type, 
                    'is_active'=>$request->is_active,
                    'is_completed'=>$request->is_completed,
                    'description'=>$request->content,
                ]);
                if($save){
                    return redirect('projects')->with('success', 'Project Updated Succssfully');
                }   
                

            } else {
                 
                $save = DB::table('projects')->where('id', $request->id)->update([
                    'display_order'=>$request->order,
                    'title'=>$request->title,
                    'location'=>$request->location,
                    'duration'=>$request->duration,
                    'completion_year'=>$request->completion_year,
                    'category'=>$request->category,
                    'type'=>$request->type, 
                    'is_active'=>$request->is_active,
                    'is_completed'=>$request->is_completed,
                    'description'=>$request->content,
                ]);
                 
                    return redirect('projects')->with('success', 'Project Updated Succssfully');
                
                  
            }   
            
            }  else {

                $save = DB::table('projects')->insertGetId([ 
                   'display_order'=>$request->order,
                    'title'=>$request->title,
                    'location'=>$request->location,
                    'duration'=>$request->duration,
                    'completion_year'=>$request->completion_year,
                    'category'=>$request->category,
                    'type'=>$request->type, 
                    'is_active'=>$request->is_active,
                    'is_completed'=>$request->is_completed,
                    'description'=>$request->content,
                ]);

                if($request->has('image')){
                
                        $file = $request->file('image');
                        foreach($file as $key=>$value){
                            $filename = md5(rand(111,000)).'.'.$value->extension();
                            $value->move(public_path('projects'), $filename);
                             DB::table('project_images')->insert(['project_id'=>$save, 'image' => $filename]); 
                        }
                      
                }  
                    return redirect('projects')->with('success', 'Project Added Succssfully');
                 
             }
         
         
        
    }
    public function delete(Request $request){
        $id = $request->id;
         $oldimg = DB::table('projects')->where('id', $id)->first();
         $path = public_path('projects/' .$oldimg->image_url);
                if(File::exists($path)){
                    File::delete($path);
            }
        $delete = DB::table('projects')->where('id', $id)->delete();
        if($delete){
            return redirect('projects')->with('error', 'Project Deleted Succssfully');
        }
    }


     
}
