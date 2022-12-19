@extends('empDepartments.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employee Record</h2>
            </div>
            <div class="pull-right">
               <button> <a class="btn btn-success" href="{{ route('empDepartments.create') }}"> Add Employees Department</a></button>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Department Name</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->department_name}}</td>
            <td>
                <form action="{{ route('empDepartments.destroy',$user->id) }}" method="POST">
   
                   <button> <a class="btn btn-info" href="{{ route('empDepartments.show',$user->id) }}">View</a></button>
    
                   <button><a class="btn btn-primary" href="{{ route('empDepartments.edit',$user->id) }}">Edit</a></button>
   
                    @csrf
                    @method('DELETE')
                    {{-- <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('users.delete', $user->id)}}"></a> --}}
                    <button type="submit" class="btn btn-danger">Delete</button>
                    {{-- <button><a href="{{ route('student.destroy', [$user['id']]) }}"
                                                        class="list-icons-item text-danger" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')" title="Delete"><i
                                                            class="icon-trash"></i></a> Delete</button> --}}
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $users->links() !!}
      
@endsection