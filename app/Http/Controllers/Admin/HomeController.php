<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File; 
class HomeController extends Controller
{
    public function index(){ 

        $awards = count(DB::table('awards')->get());
        $banners = count(DB::table('banners')->get());
        $projects = count(DB::table('projects')->get());
        $news = count(DB::table('news')->get());
        $events = count(DB::table('events')->get());
        $jobs = count(DB::table('job_openings')->get());
        $job_app = count(DB::table('job_applications')->get());
        $project_category = count(DB::table('project_categories')->get());
        $projects = count(DB::table('projects')->get());
       
        $feedback = count(DB::table('contact_us')->get());

        return view('admin.dashboard', compact('awards','banners', 'projects','news', 'events', 'jobs','job_app','projects', 'project_category','feedback'));
    }

    public function upload_header_logo(Request $request){
       $request->validate([
            'logo' => [
                'required',
                'image',
                'dimensions:min_width=600,min_height=352,max_width=600,max_height=352'
            ],
        ]);
        $pre = DB::table('header_logo')->truncate();
        if($request->has('logo')){
            $file = $request->file('logo');
            $filename = md5(time()).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('header_logo'), $filename);

            $result = DB::table('logo')->insert([
                'header_logo'=>$filename,
            ]); 

        }

       if($result){
        return back()->with('success', 'Logo Uploaded Successfully');
       }


    }
    public function upload_footer_logo(Request $request){
       $request->validate([
            'logo' => [
                'required',
                'image',
                'dimensions:min_width=150,min_height=88,max_width=600,max_height=352'
            ],
        ]);
         $pre = DB::table('footer_logo')->truncate();
        if($request->has('logo')){

            $file = $request->file('logo');
            $filename = md5(time()).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('footer_logo'), $filename);

            $result = DB::table('footer_logo')->insert([
                'footer_logo'=>$filename,
            ]);


       }

       if($result){
        return back()->with('success', 'Logo Uploaded Successfully');
       } 
    }
    public function upload_favicon(Request $request){
       // $request->validate([
       //      'logo' => [
       //          'required',
       //          'image',
       //          'dimensions:min_width=16,min_height=16,max_width=16,max_height=16'
       //      ],
       //  ]);
        $pre = DB::table('favicon')->truncate();
        if($request->has('logo')){
            
            
            $file = $request->file('logo');
            $filename = md5(time()).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('favicon'), $filename);


            $result = DB::table('favicon')->insert([
                'favicon'=>$filename,
            ]);


       }

       if($result){
        return back()->with('success', 'Logo Uploaded Successfully');
       }
         
    }
    public function contact_us(){
        $data = DB::table('contact_us')->get();
        return view('admin.contact-us',compact('data'));
    }
    
    public function delete_contact_us($id){
        $data = DB::table('contact_us')->where('id' , $id)->delete();
        if($data){
            return redirect('/contact-us')->with('error', 'Record Deleted Succssfully');
        }
        
    }
    public function seo(){
        $data = DB::table('seo')->get();
        return view('admin.seo', compact('data'));
    }
    public function add_seo(Request $request){
        $request->validate([
            
            'title'=>'required', 
            'description'=>'required',
        ]);
        DB::table('seo')->truncate();
        $save = DB::table('seo')->insert([ 
            'title'=>$request->title,
            'description'=>$request->description,
        ]);

        if($save){
            return redirect('seo')->with('success', 'Seo Saved');
        }
    }
   
    public function newsletter(){
        $data = DB::table('newsletter')->get();
        return view('admin.newsletter.newsletter', compact('data'));
    }
    public function delete_newsletter(Request $request){
        $id = $request->id;
        $data = DB::table('newsletter')->where('id', $id)->delete();
        if($data){
            return back()->with('error', 'News Letter Is Deleted');
        }
    }
    public function aboutus(){
        
        $data = DB::table('aboutus')->where('type', 'ABOUTUS')->get();
        return view('admin.about.about', compact('data' ));
    }
    public function edit_about_us($id = null){
        $list = [
            'vision'=>'Vision',
            'mission'=>'Mission',
            'story'=>'story',
            'director'=>'Director',
        ];
        if($id){
            $update = 1;
            $data = DB::table('aboutus')->where('type', 'ABOUTUS')->where('id', $id)->first();
            return view('admin.about.form', compact('update', 'data', 'list'));
        }else {

            return view('admin.about.form', compact('list'));
        }
        
    }
    public function update_about_us(Request $request){
        
        // dd($request->all());
        // exit();
        $request->validate([
            'subtitle'=>'required', 
            'title'=>'required', 
            'message'=>'required', 
            
        ]);
        
        $id = $request->id; 

        if($id){  
                if($request->has('banner')){
                    $oldimg = DB::table('aboutus')->where('id', $id)->first();
                    $path = public_path('aboutus/'.$oldimg->banner);
                
                    if(File::exists($path)){
                        File::delete($path);
                    }

                    @$path = $request->file('banner');
                    @$banner = md5(rand(111,000)).'.'.$path->extension();
                    @$path->move(public_path('aboutus'), $banner); 
                     
                    
                    $save = DB::table('aboutus')->where('type', 'ABOUTUS')->where('id', $id)->update([
                        'type'=>'ABOUTUS',
                        'subtitle'=>$request->subtitle,
                        'title'=>$request->title,
                        'message'=>$request->message, 
                        'banner'=>$banner ?? '',
                        'twitter'=>$request->twitter,
                        'facebook'=>$request->facebook,
                        'linkedin'=>$request->linkedin,
                        'experience'=>$request->experience,
                        'ongoing'=>$request->ongoing,
                        'completed'=>$request->completed,
                        'type'=>$request->type,
                    ]);
                    if($save){
                        return redirect('aboutus')->with('success', 'Record Updated Successfully');
                    }
                           
                } else { 
                    
                    $save = DB::table('aboutus')->where('type', 'ABOUTUS')->where('id', $id)->update([
                        'type'=>'ABOUTUS',
                        'subtitle'=>$request->subtitle,
                        'title'=>$request->title,
                        'message'=>$request->message,  
                        'twitter'=>$request->twitter,
                        'facebook'=>$request->facebook,
                        'linkedin'=>$request->linkedin,
                        'experience'=>$request->experience,
                        'ongoing'=>$request->ongoing,
                        'completed'=>$request->completed,
                        'type'=>$request->type,
                    ]);
                    if($save){
                        return redirect('aboutus')->with('success', 'Record Updated Successfully');
                    }
                } 
                
            $save = DB::table('aboutus')->where('id', $id)->update($data);

            if($save){
                return redirect('aboutus')->with('success', 'Record Updated Successfully');
            }
        }  else {
             
            if($request->has('banner')){
                @$path = $request->file('banner');
                @$banner = md5(rand(111,000)).'.'.$path->extension();
                @$path->move(public_path('aboutus'), $banner);
            } else {
                $filename  = '';
            }
             
            $save = DB::table('aboutus')->insert([
                'type'=>'ABOUTUS',
                'subtitle'=>$request->subtitle,
                'title'=>$request->title,
                'message'=>$request->message, 
                'banner'=>$banner,
                'twitter'=>$request->twitter,
                'facebook'=>$request->facebook,
                'linkedin'=>$request->linkedin,
                'experience'=>$request->experience,
                'ongoing'=>$request->ongoing,
                'completed'=>$request->completed,
                
            ]);
            if($save){
                return redirect('aboutus')->with('success', 'Record Added Successfully');
            }
        } 

       
    }
    public function delete_about_us(Request $request){
        $id = $request->id;
        $data = DB::table('aboutus')->where('type', 'ABOUTUS')->where('id', $id)->delete();
        if($data){
            return back()->with('error', 'Record Deleted Succssfully');
        }
    }
    public function bulk_delete($table, Request $request)
    { 
        // echo $table; 
        // dd($request->all());
        // exit();
        $id = $request->id;
        $deleted = DB::table($table)->whereIn('id', $request->selected_items)->delete();
        if($deleted){
            return back()->with("error", "Records Deleted Succssfully");
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
