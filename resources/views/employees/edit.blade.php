@extends('employees.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>
            <div class="pull-right">
                <button><a class="btn btn-primary" href="{{ route('employees.index') }}">Back</a></button>
               
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
        There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('employee.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                 <strong>Department Id:</strong>
                 <textarea class="form-control" style="height:150px" name="department_id" placeholder="department id">{{ $user->department_id }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Employee Address:</strong>
                <textarea class="form-control" style="height:150px" name="address" placeholder="Employee address">{{ $user->address }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Employee No.:</strong>
                <textarea class="form-control" style="height:150px" name="employee_no" placeholder="Employee No.">{{ $user->employee_no}}</textarea>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Employee No.:</strong>
                <select class="form-control" name="department_id" id="department_id" required="">
                    @foreach ($empDepartment as $row)
                            <option value="<?php echo $row->id?>"  <?php if($row->id==$user['department_id']){ echo 'selected'; }?>>{{ $row->department_name }}</option>
                    @endforeach
                </select>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Profile:</strong>
                <input type="file" name="file" value="{{ $user->employeeSingleProfile ? $user->employeeSingleProfile->file:""  }}" class="form-control" placeholder="profile">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection