@extends('employees.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Employee Data</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->name }}
              
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee Address:</strong>
                {{ $user->address }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee No.:</strong>
                {{ $user->employee_no}}
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Department Name:</strong>
                {{ $user->departmentRelation ? $user->departmentRelation->department_name:""}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Profile:</strong>
                {{-- {{ $user->employeeSingleProfile ? $user->employeeSingleProfile->employee_image:"" }} --}}
                {{-- <img class="img-fluid" src="{{ $user->employeeSingleProfile ? $user->employeeSingleProfile->file:"" }}" width="150" height="150" alt=""> --}}
                @forelse ($user->employeeMultipleProfile as $item)

                <div class="col-md-6 my-4">
                <img src="/uploads/{{ $item ? $item->file:""  }}" height="300px" width="300px">
                </div>
                @empty
                    
                @endforelse
            </div>
        </div>

    </div>
@endsection