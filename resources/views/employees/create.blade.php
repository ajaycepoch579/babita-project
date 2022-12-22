@extends('employees.layout')
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
    <h2>Add New Employee</h2> 
  </div>
  <div class="pull-right mt-3">
    <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
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
      <form method="post" action="{{ route('employees.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <strong>Name</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}"/>
          </div>
          {{-- <div class="form-group">
            <strong>Department Id</strong>
            <input type="number" name="department_id" class="form-control" placeholder="Department Id"/>
          </div> --}}
          <div class="form-group">
            <strong>Employee Address</strong>
              <input type="text" class="form-control" name="address" placeholder="Employee Address" value="{{old('address')}}"/>
          </div>
          <div class="form-group">
            <strong>Employee No.</strong>
              <input type="number" class="form-control" name="employee_no" placeholder="Employee No." value="{{old('employee_no')}}"/>
          </div>
          <div class="form-group">
            <strong>Department Name</strong>
            <select class="form-control" name="department_id" id="department_id" required="" value="{{old('department_id')}}">
                @foreach ($empDepartment as $row)
                        <option value="{{ $row->id }}">{{ $row->department_name }}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group">
            <strong>Profile</strong>
              <input type="file" class="form-control" name="file" multiple/>

          </div>
          <button type="submit" class="btn btn-block btn-danger">Submit</button>
      </form>
  </div>
</div>
@endsection