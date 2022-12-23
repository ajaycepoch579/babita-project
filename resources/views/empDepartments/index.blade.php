@extends('empDepartments.layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
  input.form-control.me-2 {
    margin-left: 20em;
    margin-top: 10px;
}
</style>



<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Employee Record</h2>
        </div>
        {{-- <div class="pull-right">
            <button><a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a></button>
        </div> --}}
        <div class="pull-right">
          <a class="btn btn-success" href="{{ route('empDepartments.create') }}"> Add Employees Department</a>
        </div>
    </div>
</div>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
            <th>Id</th>
            <th>Department Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->department_name}}</td>
            {{-- <td>{{ $user->employeeSingleProfile ? $user->employeeSingleProfile->file:""  }}</td> --}}
            <td >
                <a href="{{ route('empDepartments.show',$user->id)}}" class="btn btn-primary btn-sm">View</a>
                <a href="{{ route('empDepartments.edit',$user->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('empDepartments.destroy', $user->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection