<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
class AwardsController extends Controller
{
    public function index(){
        $data = DB::table('awards')->get();
        return view('admin.awards.awards', compact('data'));
    }
    public function add_award($id = null){ 
        if($id){
            $update = 'update';
            $data = DB::table('awards')->where('id', $id)->first();
            return view('admin.awards.add-update-form', compact('update','data')); 
        } else { 
            return view('admin.awards.add-update-form' );  
        }
        
    }
    public function update_awards(Request $request){

        $request->validate([
            'title'=>'required', 
            'year'=>'required|integer', 
              
        ]);

        if($request->id){
            

                $save = DB::table('awards')->where('id', $request->id)->update([
                    'title'=>$request->title, 
                    'description'=>$request->content,
                    'year'=>$request->year,
                     
                ]);  
          
            return redirect('/awards')->with('success', 'Record Updated Succssfully');
           
        } else { 

            
             $save = DB::table('awards')->insert([
                'title'=>$request->title, 
                'description'=>$request->content,
                'year'=>$request->year,
                 
            ]);
          return redirect('/awards')->with('success', 'Record Added Succssfully');  
             
        }

    }
    public function delete(Request $request){
        $id = $request->id;
       
        $data = DB::table('awards')->where('id', $id)->delete();

        return redirect('/awards')->with('error', 'Record Deleted Succssfully');
    }
}
