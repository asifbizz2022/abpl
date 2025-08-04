<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Response;
class ApplicationController extends Controller
{
     
    public function index()
    {
        $page = 'jobs';
        $data = DB::table('job_applications')->orderBy('id', 'DESC')->get();
        return view('admin.application.application', compact('data','page'));
    }

     
    public function delete(Request $request)
    {   
        $page = 'jobs';
        $id = $request->id;
         $data = DB::table('job_applications')->where('id', $id)->delete();
         if($data){
            return redirect('job-applications')->with('error', 'Record Deleted Succssfully');   
         }
         
    }
}
