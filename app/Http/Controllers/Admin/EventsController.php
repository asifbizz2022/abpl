<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB; use File;
class EventsController extends Controller
{
    public function index(){
        $data = DB::table('events')->orderBy('id', 'DESC')->get();
        return view('admin.events.events', compact('data'));
    }
    public function form($id = null){ 
        if($id){
            $update = 'update';
            $data = DB::table('events')->where('id', $id)->first();
            return view('admin.events.add-update-form', compact('update','data')); 
        } else { 
            return view('admin.events.add-update-form' );  
        }
        
    }
    public function add_update(Request $request){

        $request->validate([
            'title'=>'required',  
            'event_date'=>'required',
            'location'=>'required', 

        ]);

        if($request->id){
            $oldimg = DB::table('events')->where('id', $request->id)->first();
             if($request->has('image')){
                
                $path = public_path('events/' .$oldimg->image_url);
                if(File::exists($path)){
                    File::delete($path);
                }

                $file = $request->file('image');
                $filename = md5(time()).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('events'), $filename);

                $save = DB::table('events')->where('id', $request->id)->update([
                    'title'=>$request->title, 
                    'description'=>$request->content,
                    'location'=>$request->location,
                    'event_date'=>$request->event_date,
                    'image_url'=>$filename,
                ]); 
                
            } else {

                $save = DB::table('events')->where('id', $request->id)->update([
                    'title'=>$request->title, 
                    'description'=>$request->content,
                    'location'=>$request->location,
                    'event_date'=>$request->event_date,
                    'image_url'=>$oldimg->image_url,
                ]);  
            }
            return redirect('/events')->with('success', 'Record Updated Succssfully');
           
        } else { 

           if($request->has('image')){
            $file = $request->file('image');
            $filename = md5(time()).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('events'), $filename);

            $save = DB::table('events')->insert([
                    'title'=>$request->title, 
                    'description'=>$request->content,
                    'location'=>$request->location,
                    'event_date'=>$request->event_date,
                    'image_url'=>$filename,
            ]);
             
            }
          return redirect('/events')->with('success', 'Record Added Succssfully');  
             
        }

    }
    public function delete(Request $request){
        $id = $request->id;
         $oldimg = DB::table('events')->where('id', $id)->first();
         $path = public_path('events/' .$oldimg->image_url);
                if(File::exists($path)){
                    File::delete($path);
            }
        $data = DB::table('events')->where('id', $id)->delete();

        return redirect('/events')->with('error', 'Record Deleted Succssfully');
    }
}
