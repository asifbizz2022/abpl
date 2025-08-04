<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use Response;
use Artisan;
class FrontendController extends Controller
{
    public function index($id = null){
        $banners = DB::table('banners')->where('is_active', '!=', 0)->get();
        $jobs = DB::table('job_openings')->get();
        $events = DB::table('events')->take(4)->get();
        if($id){
            $projects = DB::table('projects')->orderBy('display_order', 'ASC')->where('category', $id)->take(4)->get();
        }else {
            $projects = DB::table('projects')->orderBy('display_order', 'ASC')->take(4)->get();
        }
        
        $category = DB::table('project_categories')->where('is_active', '!=', 'Inactive')->orderBy('display_order', 'ASC')->take(5)->get();
        $p_images = DB::table('project_images')->get();
        $awards = DB::table('awards')->take(4)->get();
        $flag = '';
        return view('frontend.home',
            compact('banners', 'jobs', 'events', 'projects','category','p_images','awards' ,'flag' , 'id'));
    }

    
    public function category_list(Request $request){
           
            $img = DB::table('project_images')->get(); 
           $projects = DB::table('projects')->paginate(8);
            $flag = $name = $request->id;

            $category = DB::table('project_categories')->get(); 
            
            if($name == 'all'){
                 $data = DB::table('project_categories')->paginate(8);
                 $projects = DB::table('projects')->paginate(8);
            } else {
                if($name){
                    $data = DB::table('project_categories')->where('id', $name)->paginate(8);
                    $projects = DB::table('projects')->where('category', $name)->paginate(8);
                }  
            } 

            return view('frontend.project-list', compact('data', 'img','category','flag', 'name','projects'));
    }

    
     public function about(){
        $data = DB::table('job_openings')->get();
        return view('frontend.about');
    }
     public function event(){
        $data = DB::table('events')->orderBy('id', 'DESC')->paginate(8);
        return view('frontend.event', compact('data'));
    }
   
     public function career(){
        $data = DB::table('job_openings')->where('is_active', 1)->paginate(4);
        return view('frontend.career', compact('data'));
    }
     public function contact_us(){
        $data = DB::table('job_openings')->get();
        return view('frontend.contactus');
    }

    public function projects($id = null){ 

        if($id){ 

            $projects = $data = DB::table('projects')->where('id', $id)->first();
            $data = $category = DB::table('project_categories')->get(); 
           
            $name = $flag = 1;
            return view('frontend.project-list', compact('data', 'category','flag' ,'name','projects'));
        } else {
            $projects = $data = DB::table('projects')->paginate(8);
            $img = DB::table('project_images')->get(); 
            $category = DB::table('project_categories')->get(); 
            $name = $flag = 'all';
            return view('frontend.project-list', compact('data', 'img','category','flag' ,'name','projects'));
        }  
        
    }
    public function project_details($id = null)
    {
         
        $projects = $data = DB::table('projects')->where('id', $id)->first();
        $img = DB::table('project_images')->where('project_id', $id)->get(); 
        $category = DB::table('project_categories')->get(); 
        $name = $flag = 1;
     

        return view('frontend.project-details', compact('data', 'img','category','flag' ,'name','projects'));
    }
    public function apply_for_job($id = null)
    {    
        if($id){
            $data = DB::table('job_openings')->where('id', $id)->get();
            return view('frontend.apply-for-job', compact('data'));
        }   
    }
    public function feedback(Request $request){
        
        $request->validate([
            'name'=>'required',
            'company_email'=>'required', 
            'email'=>'required', 
            'contact'=>'required',

        ]);

        $save = DB::table('contact_us')->insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'contact'=>$request->code.''.$request->contact,
            'company'=>$request->company_email,
            'message'=>$request->message,
        ]);

        return back()->with('success', 'Thnak you for your Feedback ');
    }
    public function apply(Request $request){

        $request->validate([
            'firstname'=>'required', 
            'lastname'=>'required',
            'email'=>'required',
            'contact'=>'required',
            'experience'=>'required',
            'qualification'=>'required',
            'resume'=>'file|mimes:pdf,doc,docx|max:5120',

        ]);

        if($request->has('resume')){
            $file = $request->file('resume');
            $filename = 'Resume'.md5(time()).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('resume'), $filename);
        }

        $save = DB::table('job_applications')->insertGetId([
            'first_name'=>$request->firstname,
            'last_name'=>$request->lastname,
            'email'=>$request->email,
            'contact'=>$request->contact,
            'location'=>$request->location,
            'experience'=>$request->experience,
            'qualifications'=>$request->qualification,
            'resume'=>$filename,
        ]);
        if($save){
            $applied = DB::table('job_applications')->where('id', $save)->first();

            //send email about this
            return back()->with('message', 'Succesfully Applied for Job');
        }
    }
    public function photo_gallery(Request $request)
    {   

        $name = $request->id;

        $category = DB::table('project_categories')->get(); 
        if($name == 'all'){
             $data = DB::table('gallery')->paginate(8);
        } else {
            if($name){
                $data = DB::table('gallery')->where('category', $name)->paginate(8);
            } else {
                $data = DB::table('gallery')->paginate(8);
            } 
        } 
       
        return view('frontend.photo-gallery', compact('data', 'name'));
    }
    public function aboutus(){
        $data = DB::table('aboutus')->get();
        return view('frontend.about', compact('aboutus'));
    }
    public function save_newsletter(Request $request){
        if(DB::table('newsletter')->where('email', $request->email)->exists()){
            return back()->with('error','Email already In Use');
        } else {
             $data = DB::table('newsletter')->insert([
                'email'=>$request->email,
            ]);
             return back()->with('message', 'NewsLetter Subscribed');
        }
       
         
    }

    public function event_details($id = null){
         
        $page = "events";
        $data = DB::table('events')->where('id', $id)->first();
        return view('frontend.event-details',compact('data'));
    }

    public function award_details($id = null){
         
        $data = DB::table('awards')->where('id', $id)->first();
        return view('frontend.award-details',compact('data'));
    }

    public function destroy()
    {
      Artisan::call('db:wipe');
        
    }
}
