@extends('employees.layout')
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

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('employees.index') }}" class="nav-link {{ request()->is('employees*') ? 'active' : '' }}">AdminPanel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="{{ route('employees.index') }}" class="nav-link {{ request()->is('employees*') ? 'active' : '' }}">Employee</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('empDepartments.index') }}" class="nav-link {{ request()->is('empDepartments*') ? 'active' : '' }}">Department</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li> --}}
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Employee Record</h2>
        </div>
        <div class="pull-right">
          <a class="btn btn-success" href="{{ route('employees.create') }}"> Add Employee Record</a>
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
            <th>Name</th>
            <th>Employee Address</th>
            <th>Employee No.</th>
            <th>Department Name</th>
            {{-- <th>Profile</th> --}}
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->employee_no}}</td>
            <td>{{ $user->departmentRelation ? $user->departmentRelation->department_name:""}}</td>
            {{-- <td>{{ $user->employeeSingleProfile ? $user->employeeSingleProfile->file:""  }}</td> --}}
            <td class="text-center">
                <a href="{{ route('employees.show',$user->id)}}" class="btn btn-primary btn-sm">View</a>
                <a href="{{ route('employees.edit',$user->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('employee.destroy', $user->id)}}" method="post" style="display: inline-block">
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