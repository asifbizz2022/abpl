<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Response;
class JobsController extends Controller
{
    public function index(){
        $page = 'jobs';
        $data = DB::table('job_openings')->orderBy('id', 'ASC')->get();
        return view('admin.jobs.jobs', compact('data','page'));
    }

    public function form($id = null){
        $page = 'jobs';

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

        $category = DB::table('job_openings')->get();
         if($id){
            $update = 'update';
            $data = DB::table('job_openings')->where('id', $id)->first();
            return view('admin.jobs.form', compact('update', 'data', 'status','order','category','page'));
         } else {
            return view('admin.jobs.form', compact('status','order','category','page'));
         }
    }
    public function save(Request $request){
        $page = 'jobs';
       
        $request->validate([
            'job_type'=>'required',
            'title'=>'required',
            'location'=>'required', 
            'experience'=>'required',
            'seats'=>'required',
            'salary'=>'required',
            'is_active'=>'required',
        ]);
       
        $id = $request->id; 

        if($request->id){
            
            $oldimg = DB::table('job_openings')->where('id', $request->id)->first(); 
            $save = DB::table('job_openings')->where('id', $id)->update([ 
                'job_type'=>$request->job_type,
                'title'=>$request->title,
                'location'=>$request->location, 
                'experience'=>$request->experience,
                'seats'=>$request->seats,
                'salary_range'=>$request->salary, 
                'is_active'=>$request->is_active,
                'description'=>$request->content,
            ]);  
         
            return redirect('jobs')->with('success', 'Record Updated Succssfully');
            
        } else {
            //adding 

            $save = DB::table('job_openings')->insert([ 
                'job_type'=>$request->job_type,
                'title'=>$request->title,
                'location'=>$request->location, 
                'experience'=>$request->experience,
                'seats'=>$request->seats,
                'salary_range'=>$request->salary, 
                'is_active'=>$request->is_active,
                'description'=>$request->content,
            ]);
            if($save){
                return redirect('jobs')->with('success', 'Record Added Succssfully');
            } 
        }  
    }

    public function delete(Request $request){
        $page = 'jobs';
        $id = $request->id; 
        $delete = DB::table('job_openings')->where('id', $id)->delete();
        if($delete){
            return redirect('jobs')->with('error', 'Record Deleted Succssfully');
        }
    }
}
