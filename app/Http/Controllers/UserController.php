<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentAddress;

class UserController extends Controller
{
    
    public function index()
    {
        $users = Student::latest()->paginate(10);
    
        return view('students.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['page_title'] = 'Add Student';

        $student   = Student::all();
        $studentAddress =  StudentAddress::get(); 
        return view('students.create')->with(compact('data','student','studentAddress'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'rollno' => 'required',
        ]);
    
        $requestData = $request->all();

        $resourceObj = new Student;
        $resourceObj->name = $requestData['name'];
        $resourceObj->class= $requestData['class'];
        $resourceObj->rollno= $requestData['rollno'];
      
        if($resourceObj->save()){
           
        $stu_id = $resourceObj->id;

        $addressObj = new StudentAddress();
        $addressObj->user_id = $stu_id;
        $addressObj->student_address = $requestData['student_address'];
        }
        $addressObj->save();
        return redirect()->route('students.index')->with('success','student','User created successfully.');
        
    }
   
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = student::find($id); 
        return view('students.show',compact('user'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $user , $id)
    {
        $user =student::find($id);
        $studentObj  = StudentAddress::all();
        return view('students.edit',compact('user','studentObj'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'rollno' => 'required',
            
        ]);
       
        // $user->update($request->all());
        // $user =student::find($id);

            $requestData = $request->all();
    
            $filterObj = Student::find($id);
            $filterObj->name = $requestData['name'];
            $filterObj->class = $requestData['class'];
            $filterObj->rollno = $requestData['rollno'];

            if($filterObj->save()){

            $user_id = $filterObj->id;
            $filterAdd  = StudentAddress::where('user_id', $user_id)->first();
            $filterAdd->student_address = $requestData['student_address'];
            }
            $filterAdd->save();
        return redirect()->route('students.index')->with('success','Student record updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request,Student $user,$id)
    {
        if (!$id) {
            return redirect()->route('students.index')->with('error');
        }

        $user = Student::find($id);

        if ($user->delete()) {
            return redirect()->route('students.index')->with('success', 'user deleted successfully');
        }
        return redirect()->route('students.index')->with('error');
    }


}
