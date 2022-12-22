@extends('empDepartments.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Employee Department Data</h2>
            </div>
            <div class="pull-right">
                <button><a class="btn btn-primary" href="{{ route('empDepartments.index') }}"> Back</a></button>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Department Name:</strong>
                {{ $user->department_name }}
              
            </div>
        </div>
        
        
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employees List:</strong>

                @foreach ($user->empList as $item)
                
                   {{$item ? $item->name:""}}
                
                @endforeach
            </div>
        </div>
        
        
    </div>
@endsection