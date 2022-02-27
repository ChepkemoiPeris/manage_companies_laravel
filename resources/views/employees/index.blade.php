@extends('layouts.app')

@section('content')
    <div class="row">
        
        <div class="col-lg-2 margin-tb">
            <div class="pull-left">
                <h2>Employees List</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('employees.create') }}" class="btn btn-success" title="Create an employee"> <i class="fas fa-plus"></i> Create new employee
                    </a>
            </div>
           
        </div>
        <div class="col-lg- margin-tb">
            
            <div >
                <a href="{{ route('companies.index') }}" class="btn btn-primary" title="Create an employee"> <i class="fas fa-plus"></i> Go to Companies
                    </a>
            </div>
           
        </div>
    </div>
     
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Company</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
        @foreach ($employee as $emp)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$emp->first_name}}</td>
                <td>{{$emp->last_name}}</td>
                <td>{{$emp->name}}</td>
                <td>{{$emp->email}}</td>
                <td>{{$emp->phone}}</td>
                <td>{{$emp->created_at}}</td>
                <td>
                    <form action="{{ route('employees.destroy',$emp->id) }}" method="POST">

                        <a href="{{ route('employees.show',$emp->id) }}" class="btn btn-success" title="show">
                            <i class="fas fa-eye fa-lg">Show</i>
                        </a>
                        
                        <a href="{{ route('employees.edit',$emp->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit  fa-lg">Edit</i>
                        </a> 
                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg btn btn-danger">Delete</i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $employee->links() !!}

@endsection