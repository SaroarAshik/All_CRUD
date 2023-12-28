<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller{
    
    public function index(){
        $students = DB::table('students')->paginate(5);
        return view('students.index', compact('students'));
    }

    public function create(){
        return view('students.create');
    }

    public function store(Request $request){
            $request->validate([
                'name'=>'required',
                'address'=>'required',
                'image'=>'required|image|mimes:jpeg,png,jpg,giv,svg|max:2048',
            ]);
            if($image=$request->file('image')){
                $destinationPath="images/";
                $profileImage=date('YmdHis').".".$image->getClientOriginalExtension();
                $image->move($destinationPath,$profileImage);
            }
            
            DB::table('students')->insert([
                    'name'=>$request->name,
                    'address'=>$request->address,
                    'image'=>$profileImage,
                    'created_at' =>  date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            return "Student Added Successfully";
    }

    public function show($id){
        $student = DB::table('students')->find($id);
        return view('students.show',['student' => $student]);
    }


    public function edit($id){
        $student = DB::table('students')->find($id);
        return view('students.edit',['student' => $student]);
    }

    public function update(Request $request, $id){
            $request->validate([
                'name'=>'required',
                'address'=>'required',
                'image'=>'required|image|mimes:jpeg,png,jpg,giv,svg|max:2048',
            ]);
            if($image=$request->file('image')){
                $destinationPath="images/";
                $profileImage=date('YmdHis').".".$image->getClientOriginalExtension();
                $image->move($destinationPath,$profileImage);
            }
            else{
                unset($profileImage);
            }
            
            DB::table('students')
                    ->where('id',$id)
                    ->update([
                    'name'=>$request->name,
                    'address'=>$request->address,
                    'image'=>$profileImage,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
                return "Student Updated Successfully";
            }

            
    public function destroy($id){
        DB::table('students')->where('id',$id)->delete();
        return redirect()->route('students.index')
           ->with('success', 'Student deleted successfully');    
    }

}