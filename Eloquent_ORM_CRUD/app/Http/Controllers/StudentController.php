<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller{
    
    public function index(){
        $students = Student::orderBy('id','desc')->paginate(10);
        return view('index', compact('students'));
    }
    
    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);
        Student::create($request->post());
        return redirect()->route('students.index')->with('success','Student has been created successfully.');
    }

    public function show(Student $student){
        return view('show',compact('student'));
    }
    // public function show($id){
    //     $student = Student::find($id);
    //     return view('show',['student' => $student]);
    // }
    //another way to read data from database

    public function edit(Student $student){
        return view('edit',compact('student'));
    }
    
    // public function edit($id){
    //     $student = Student::find($id);
    //     return view('edit',['student' => $student]);
    // }
    //another way to read data from database

    public function update(Request $request, Student $student){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);
        
        $student->fill($request->post())->save();
        return redirect()->route('students.index')->with('success','Student has Been updated successfully');
    }

    public function destroy(Student $student){
        $student->delete();
        return redirect()->route('students.index')->with('success','Student has been deleted successfully');
    }


}