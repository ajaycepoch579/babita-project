<?php

namespace App\Http\Controllers;

use App\Models\EmpDepartment;
use App\Models\Employee;
use App\Models\EmpProfile;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){

        $users = Employee::latest()->paginate(10);
    
        return view('employees.index',compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $data = [];
        $data['page_title'] = 'Add Employees';

        $empDepartment   = EmpDepartment::all();
        $employee =  Employee::get(); 
        $empProfile =  EmpProfile::get();
        
        return view('employees.create')->with(compact('data','empDepartment','empProfile'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'department_id' => 'required',
            'address' => 'required',
            'employee_no' => 'required',
            'file' =>  'required',
        ]);
    
        $requestData = $request->all();

        $resourceObj = new Employee;
        $resourceObj->name = $requestData['name'];
        $resourceObj->department_id= $requestData['department_id'];
        $resourceObj->address= $requestData['address'];
        $resourceObj->employee_no= $requestData['employee_no'];
        if($resourceObj->save()){
           
            $emp_id = $resourceObj->id;
    
            $addressObj = new EmpProfile();
            $addressObj->employee_id = $emp_id;
            // $addressObj->file = $requestData['file'];
            if (isset($requestData['file']) && $requestData['file'] != '') {
                $addressObj->file = $requestData['file'];
            }
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path().'/uploads/profile', $fileName);
                $addressObj->file = $fileName;
            }

        }
        $addressObj->save();

        return redirect()->route('employees.index')
        ->with('success','User created successfully.');
    }

    public function show($id)
    {
        $user = Employee::find($id); 
        return view('employees.show',compact('user'));
    } 

    public function edit(Employee $user , $id)
    {
        $user =Employee::find($id);
       $user['page_title'] = 'Edit record';
       
       $empDepartment   = EmpDepartment::all();
       $empProfile  = EmpProfile::all();

        return view('employees.edit',compact('user','empDepartment','empProfile'));
    }

    public function update(Request $request ,$id)
    {
        $request->validate([
            'name' => 'required',
            'department_id' => 'required',
            'address' => 'required',
            'employee_no' => 'required',
            'file' => 'required',
            
        ]);
       

            $requestData = $request->all();
    
            $filterObj = Employee::find($id);
            $filterObj->name = $requestData['name'] ?? $filterObj->name;
            $filterObj->department_id= $requestData['department_id'] ?? $filterObj->department_id;
            $filterObj->address= $requestData['address'] ?? $filterObj->address;
            $filterObj->employee_no= $requestData['employee_no'] ?? $filterObj->employee_no;

            if($filterObj->save()){

                $employee_id = $filterObj->id;
                $filterAdd  = EmpProfile::where('employee_id', $employee_id)->first();
                $filterAdd->file = $requestData['file'];
                }
                $filterAdd->save();

        return redirect()->route('employees.index')->with('success','Employee record updated successfully');
    }

    public function destroy( Request $request,Employee $user,$id)
    {
        if (!$id) {
            return redirect()->route('employees.index')->with('error');
        }

        $user = Employee::find($id);

        if ($user->delete()) {
            return redirect()->route('employees.index')->with('success', 'user deleted successfully');
        }
        return redirect()->route('employees.index')->with('error');
    }
}
