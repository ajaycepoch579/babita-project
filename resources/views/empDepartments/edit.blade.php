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
    <h2>Edit & Update Department Record</h2>
  </div>
  <div class="pull-right mt-3">
    <a class="btn btn-primary" href="{{ route('empDepartments.index') }}">Back</a>
   
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
      <form method="post" action="{{ route('empDepartment.update',$user->id) }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              @method('put')
              <strong>Department Name:</strong>
              <input type="text" name="department_name" value="{{ $user->department_name }}" class="form-control" placeholder="Department Name">
          </div>
          
          <button type="submit" class="btn btn-block btn-danger">Update</button>
      </form>
  </div>
</div>
@endsection