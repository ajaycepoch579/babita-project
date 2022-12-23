@extends('empDepartments.layout')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    <h2>Add Employee Departments</h2> 
  </div>
  <div class="pull-right mt-3">
    <a class="btn btn-primary" href="{{ route('empDepartments.index') }}"> Back</a>
</div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('empDepartments.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <strong>Department Name</strong>
              <input type="text" name="department_name" class="form-control" placeholder="Department Name" value="{{old('department_name')}}">
          </div>
          
          <button type="submit" class="btn btn-block btn-danger">Submit</button>
      </form>
  </div>
</div>
@endsection