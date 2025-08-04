<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; use File;
class AboutController extends Controller
{
     
    ///mission
    public function mission(){
        $data = DB::table('aboutus')->where('type', 'MISSION')->get();
        return view('admin.mission.mission', compact('data'));
    }
    public function form_mission($id = null){ 
       
        if($id){
            $update = 'update';
            $data = DB::table('aboutus')->where('type', 'MISSION')->where('id', $id)->first();
            return view('admin.mission.add-update-form', compact('update','data')); 
        } else { 
            return view('admin.mission.add-update-form' );  
        }
        
    }
    public function add_update_mission(Request $request){

        $request->validate([
            'title'=>'required',  
        ]);

        if($request->id){ 
        if($request->has('image')){
                $path = $request->file('image');
                $filename = md5(rand(00000,99999)).'.'.$path->extension();
                $path->move(public_path('mission'), $filename);

                $save = DB::table('aboutus')->where('type','MISSION')->where('id', $request->id)->update([
                    'type'=>'MISSION',
                    'title'=>$request->title, 
                    'message'=>$request->message,
                    'image'=>$filename,
                     'subtitle'=>'Our Mission', 
                ]); 
            }  
            else {
                $save = DB::table('aboutus')->where('type','MISSION')->where('id', $request->id)->update([
                    'type'=>'MISSION',
                    'title'=>$request->title, 
                    'message'=>$request->message, 
                     'subtitle'=>'Our Mission', 
                ]); 
            }
                 
            return redirect('/mission')->with('success', 'Record Updated Succssfully');
           
        } else {  
            if($request->has('image')){
                $path = $request->file('image');
                $filename = md5(rand(00000,99999)).'.'.$path->extension();
                $path->move(public_path('mission'), $filename);
            }
            $save = DB::table('aboutus')->insert([
                'type'=>'MISSION',
                'title'=>$request->title, 
                'message'=>$request->message,
                'image'=>$filename,
                 'subtitle'=>'Our Mission', 
            ]); 
            
            return redirect('/mission')->with('success', 'Record Added Succssfully');  
             
        }

    }
    public function delete_mission(Request $request){
        $id = $request->id;
        $data = DB::table('mission')->where('id', $id)->delete();

        return redirect('/mission')->with('error', 'Record Deleted Succssfully');
    }

     ///DIRECTOR 
    public function director(){
        $data = DB::table('aboutus')->where('type', 'DIRECTOR')->get();
        return view('admin.director.director', compact('data'));
    }
    public function form_director($id = null){ 
       
        if($id){
            $update = 'update';
            $data = DB::table('aboutus')->where('type', 'DIRECTOR')->where('id', $id)->first();
            return view('admin.director.add-update-form', compact('update','data')); 
        } else { 
            return view('admin.director.add-update-form' );  
        }
        
    }
    public function add_update_director(Request $request){

        $request->validate([
            'title'=>'required',  
        ]);

        if($request->id){ 
        if($request->has('image')){
                $path = $request->file('image');
                $filename = md5(rand(00000,99999)).'.'.$path->extension();
                $path->move(public_path('director'), $filename);

                $save = DB::table('aboutus')->where('type', 'DIRECTOR')->where('id', $request->id)->update([
                    'type'=>'DIRECTOR',
                    'title'=>$request->title, 
                    'message'=>$request->message,
                    'subtitle'=>'Director' ,
                    'image'=>$filename,
                    'twitter'=>$request->twitter,
                    'facebook'=>$request->facebook,
                    'linkedin'=>$request->linkedin,  
                   
                ]); 
            }  
            else {
                $save = DB::table('aboutus')->where('type', 'DIRECTOR')->where('id', $request->id)->update([
                    'type'=>'DIRECTOR',
                    'title'=>$request->title, 
                    'message'=>$request->message,
                    'subtitle'=>'Director',
                    'twitter'=>$request->twitter,
                    'facebook'=>$request->facebook,
                    'linkedin'=>$request->linkedin,  

                   
                ]); 
            }
                 
            return redirect('/director')->with('success', 'Record Updated Succssfully');
           
        } else {  
            if($request->has('image')){
                $path = $request->file('image');
                $filename = md5(rand(00000,99999)).'.'.$path->extension();
                $path->move(public_path('director'), $filename);
            }
            $save = DB::table('aboutus')->insert([
                'type'=>'DIRECTOR',
                'title'=>$request->title, 
                'message'=>$request->message,
                'subtitle'=>'Director',
                'image'=>$filename,
                'twitter'=>$request->twitter,
                'facebook'=>$request->facebook,
                'linkedin'=>$request->linkedin,  

                 
            ]);
             
            
          return redirect('/director')->with('success', 'Record Added Succssfully');  
             
        }

    }
    public function delete_director(Request $request){
        $id = $request->id;
        $data = DB::table('aboutus')->where('type', 'DIRECTOR')->where('id', $id)->delete();

        return redirect('/director')->with('error', 'Record Deleted Succssfully');
    }
     ///STORY 
    public function story(){
        $data = DB::table('aboutus')->where('type', 'STORY')->get();
        return view('admin.story.story', compact('data'));
    }

    public function form_story($id = null){ 
       
        if($id){
            $update = 'update';
            $data = DB::table('aboutus')->where('type', 'STORY')->where('id', $id)->first();
            return view('admin.story.add-update-form', compact('update','data')); 
        } else { 
            return view('admin.story.add-update-form' );  
        }
        
    }
    public function add_update_story(Request $request){

        $request->validate([
            'title'=>'required',  
        ]);

        if($request->id){ 
        if($request->has('image')){
                $path = $request->file('image');
                $filename = md5(rand(00000,99999)).'.'.$path->extension();
                $path->move(public_path('story'), $filename);

                $save = DB::table('aboutus')->where('type','STORY')->where('id', $request->id)->update([
                    'type'=>'STORY',
                    'title'=>$request->title, 
                    'subtitle'=>'Our Story', 
                    'message'=>$request->message,
                    'image'=>$filename,
                    'twitter'=>$request->twitter,
                    'facebook'=>$request->facebook,
                    'linkedin'=>$request->linkedin,  
                   
                ]); 
            }  
            else {
                $save = DB::table('aboutus')->where('type','STORY')->where('id', $request->id)->update([
                    'type'=>'STORY',
                    'title'=>$request->title, 
                    'message'=>$request->message,
                    'subtitle'=>'Our Story', 
                    'twitter'=>$request->twitter,
                    'facebook'=>$request->facebook,
                    'linkedin'=>$request->linkedin,  

                   
                ]); 
            }
                 
            return redirect('/story')->with('success', 'Record Updated Succssfully');
           
        } else {  
            if($request->has('image')){
                $path = $request->file('image');
                $filename = md5(rand(00000,99999)).'.'.$path->extension();
                $path->move(public_path('story'), $filename);
            }
            $save = DB::table('aboutus')->insert([
                    'type'=>'STORY',
                    'title'=>$request->title, 
                    'message'=>$request->message,
                    'image'=>$filename,
                    'subtitle'=>'Our Story', 
                    'twitter'=>$request->twitter,
                    'facebook'=>$request->facebook,
                    'linkedin'=>$request->linkedin,  

                 
            ]);
             
            
          return redirect('/story')->with('success', 'Record Added Succssfully');  
             
        }

    }
    public function delete_story(Request $request){
        $id = $request->id;
        $data = DB::table('aboutus')->where('type', 'STORY')->where('id', $id)->delete();

        return redirect('/story')->with('error', 'Record Deleted Succssfully');
    }
     ///VISION 
    public function vision(){
        $data = DB::table('aboutus')->where('type', 'VISION')->get();
        return view('admin.vision.vision', compact('data'));
    }
    public function form_vision($id = null){ 
       
        if($id){
            $update = 'update';
            $data = DB::table('aboutus')->where('id', $id)->where('type', 'VISION')->first();
            return view('admin.vision.add-update-form', compact('update','data')); 
        } else { 
            return view('admin.vision.add-update-form' );  
        }
        
    }
    public function add_update_vision(Request $request){

        $request->validate([
            'title'=>'required',  
        ]);

        if($request->id){ 
        if($request->has('image')){
                $path = $request->file('image');
                $filename = md5(rand(00000,99999)).'.'.$path->extension();
                $path->move(public_path('vision'), $filename);

                $save = DB::table('aboutus')->where('type', 'VISION')->where('id', $request->id)->update([
                    'type'=>'VISION',
                    'title'=>$request->title, 
                    'subtitle'=>'Our Vision', 
                    'message'=>$request->message,
                    'image'=>$filename,
                    'twitter'=>$request->twitter,
                        'facebook'=>$request->facebook,
                        'linkedin'=>$request->linkedin,  
                   
                ]); 
            }  
            else {
                $save = DB::table('aboutus')->where('type', 'VISION')->where('id', $request->id)->update([
                    'type'=>'VISION',
                    'title'=>$request->title, 
                    'message'=>$request->message,
                    'subtitle'=>'Our Vision', 
                    'twitter'=>$request->twitter,
                        'facebook'=>$request->facebook,
                        'linkedin'=>$request->linkedin,  

                   
                ]); 
            }
                 
            return redirect('/vision')->with('success', 'Record Updated Succssfully');
           
        } else {  
            if($request->has('image')){
                $path = $request->file('image');
                $filename = md5(rand(00000,99999)).'.'.$path->extension();
                $path->move(public_path('vision'), $filename);
            }
            $save = DB::table('aboutus')->insert([
                'type'=>'VISION',
               'title'=>$request->title, 
                    'message'=>$request->message,
                    'image'=>$filename,
                     'subtitle'=>'Our Vision', 
                    'twitter'=>$request->twitter,
                        'facebook'=>$request->facebook,
                        'linkedin'=>$request->linkedin,  
 
            ]);
             
            
          return redirect('/vision')->with('success', 'Record Added Succssfully');  
             
        }

    }
    public function delete_vision(Request $request){
        $id = $request->id;
        $data = DB::table('aboutus')->where('type', 'VISION')->where('id', $id)->delete();

        return redirect('/vision')->with('error', 'Record Deleted Succssfully');
    }
}
