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
    <h2>Edit & Update Employee Record</h2>
  </div>
  <div class="pull-right mt-3">
    <a class="btn btn-primary" href="{{ route('employees.index') }}">Back</a>
   
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
      <form method="post" action="{{ route('employee.update',$user->id) }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              @method('put')
              <strong>Name:</strong>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
          </div>
          {{-- <div class="form-group">
            <strong>Department Id</strong>
            <input type="number" name="department_id" value="{{  $user->department_id  }}" class="form-control" placeholder="Department Id">
          </div> --}}
          <div class="form-group">
            <strong>Employee Address</strong>
            <input type="text" name="address" value="{{ $user->address }}" class="form-control" placeholder="Employee Address">
          </div>
          <div class="form-group">
            <strong>Employee No.</strong>
            <input type="number" name="employee_no" value="{{ $user->employee_no }}" class="form-control" placeholder="Employee No.">
          </div>
          <div class="form-group">
             <strong>Department Name</strong>
             <select class="form-control" name="department_id" id="department_id" required="">
                @foreach ($empDepartment as $row)
                        <option value="<?php echo $row->id?>"  <?php if($row->id==$user['department_id']){ echo 'selected'; }?>>{{ $row->department_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <strong>Profile</strong>
            @foreach ($user->employeeMultipleProfile as $item)
            <input type="file" name="file" value="{{ $item ? $item->file:"" }}" class="form-control" multiple/>
            @endforeach
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update</button>
      </form>
  </div>
</div>
@endsection