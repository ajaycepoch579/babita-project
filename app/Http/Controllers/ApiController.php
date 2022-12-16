<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests;
use App\Http\Resources\Api as ApiResource;
use App\Models\StudentAddress;

class ApiController extends Controller
{

    public function store(Request $request)
    {
     //create a student record

        $request->validate([
        'name'=>'required',
        'class'=>'required',
        'rollno'=>'required|unique:students'
        ]);

     $students = new Student(); 

        $students->name = $request->input('name');
        $students->class = $request->input('class');
        $students->rollno = $request->input('rollno');

        $students->save();
        return new ApiResource($students);
    }

    public function index(Request $request)
    {
      //get retrive all student record listing

        $response = [];
        $response['data'] =[];
         $response['status'] = true;
        $response['message'] = "Not found!";


        $students = Student::with('studentAddress')->get();

     if(!$students->isEmpty())
        {
            $response['data'] = $students;
            $response['message'] = "Student listing";
        }

        return new ApiResource($response);
    }

    public function show($id)
    {
     //get specific student record by id

        $students = Student::findOrFail($id);
        return new ApiResource($students);
    }


  public function update(Request $request, $id)
   {
     //update specific student record

      $request->validate([
       'name'=>'required',
        'class'=>'required',
        'rollno'=>'required'
       ]);

     $students = Student::findOrFail($id);

        $students->name = $request->input('name');
        $students->class = $request->input('class');
        $students->rollno = $request->input('rollno');

        $students->save();
       return new ApiResource($students);

    }



  public function delete($id)
    {
        $response = [];
        $response['data'] =[];
        $response['status'] = false;
        $response['message'] = "Not found!";

        $students = Student::find($id);

        if(empty($students)){
           
            $response['message'] = "Record Not Found";
            return new ApiResource($response);
        }


        if($students->delete())
        {
            $response['status'] = true;
            $response['message'] = "Record Has Been Deleted Successfully";

        }else{
            $response['message'] = "something went wrong";

        }

      
        return new ApiResource($response);

    }


    public function add_address(Request $request)
    {
        $request->validate([
            'student_address'=>'required'
            
        ]);
    
        $studentAdd = new StudentAddress(); 
    
        $studentAdd->student_address = $request->input('student_address');
        $studentAdd->user_id = $request->input('user_id');
    
        $studentAdd->save();
        return new ApiResource($studentAdd);
    }




    public function updateAddress(Request $request, $id)
   {
        //update specific student record address
     
        $request->validate([
        //'student_address'=>'required'
             
        ]);
     
        $studentObj = StudentAddress::findOrFail($id);
     
        $studentObj->student_address = $request->input('student_address');
     
        $studentObj->save();
        return new ApiResource($studentObj);
     
    }
}




    



