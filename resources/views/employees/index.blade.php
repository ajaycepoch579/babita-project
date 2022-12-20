@extends('employees.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employee Record</h2>
            </div>
            <div class="pull-right">
               <button> <a class="btn btn-success" href="{{ route('employees.create') }}"> Add Employee Record</a></button>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Employee Address</th>
            <th>Employee No.</th>
            <th>Department Name</th>
            <th>Profile</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->employee_no}}</td>
            <td>{{ $user->departmentRelation ? $user->departmentRelation->department_name:""}}</td>
            <td>{{ $user->employeeSingleProfile ? $user->employeeSingleProfile->file:""  }}</td>
            
            <td>
                <button> <a class="btn btn-info" href="{{ route('employees.show',$user->id) }}">View</a></button>
    
                <button><a class="btn btn-primary" href="{{ route('employees.edit',$user->id) }}">Edit</a></button>
                {{-- <form action="{{ route('employee.destroy',$user->id) }}" method="POST"> --}}
                <form action="{{ route('employee.destroy', $user->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">Delete</button>
                </form>
                
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $users->links() !!}
      
@endsection