<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        $data = DB::table('company_details')->get();
        return view('admin.company_details.company-details', compact('data'));
    }
    public function form($id == null){
        if($id){

        } 
        else {

        }
    }
    public function add_and_update(Request $request){
        $id = $requst->id;
        if($id){

        }
        else{

        }
    }
    public function delete(Request $request){
        $id = $request->id;
        $data = DB::table('company_details')->where('id', $id)->delete();
        if($data){
            return redirect()->with('error', 'Record Deleted Succssfully');
        }
    }
}
