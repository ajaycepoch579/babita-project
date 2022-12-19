<?php

namespace App\Http\Controllers;

use App\Models\EmpDepartment;
use Illuminate\Http\Request;

class EmpDepartmentController extends Controller
{
    public function index(){

        $users = EmpDepartment::latest()->paginate(10);
    
        return view('empDepartments.index',compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $data = [];
        $data['page_title'] = 'Add Employees Department';
        
        return view('empDepartments.create')->with(compact('data','employee'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required',
        ]);
    
        $requestData = $request->all();

        $resourceObj = new EmpDepartment();
        $resourceObj->department_name= $requestData['department_name'];
        $resourceObj->save();

        return redirect()->route('empDepartments.index')
                        ->with('success','Department created successfully.');
    }

    public function show($id)
    {
        $user = EmpDepartment::find($id); 
        return view('empDepartments.show',compact('user'));
    } 
    public function edit($id)
    {
        $user = EmpDepartment::find($id);
        $user['page_title'] = 'Edit Employee Department';

        return view('empDepartments.edit')->with(compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'department_name' => 'required',
        ]);

        $requestData = $request->all();

            $resourceObj = EmpDepartment::find($id);
            $resourceObj->department_name = $requestData['department_name'] ?? $resourceObj->department_name;

            $resourceObj->save();
            return redirect()->route('empDepartments.index')->with('success','Employee record updated successfully');

    }

    public function destroy( Request $request,EmpDepartment $user,$id)
    {
        if (!$id) {
            return redirect()->route('empDepartments.index')->with('error');
        }

        $user = EmpDepartment::find($id);

        if ($user->delete()) {
            return redirect()->route('empDepartments.index')->with('success', 'user deleted successfully');
        }
        return redirect()->route('empDepartments.index')->with('error');
    }
}
