@extends('employees.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Employee Data</h2>
            </div>
            <div class="pull-right">
                <button><a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a></button>
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
    </div>
@endsection