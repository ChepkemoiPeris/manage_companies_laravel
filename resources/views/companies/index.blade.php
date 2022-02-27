@extends('layouts.app')

@section('content')
    <div class="row">
        
        <div class="col-lg-2 margin-tb">
            <div class="pull-left">
                <h2>Companies List</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('companies.create') }}" class="btn btn-success" > <i class="fas fa-plus"></i> Create new company
                    </a>
            </div>
           
        </div>
        <div class="col-lg- margin-tb">
            
            <div >
                <a href="{{ route('employees.index') }}" class="btn btn-primary" > <i class="fas fa-plus"></i> Go to Employees
                    </a>
            </div>
           
        </div>
    </div>
     
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>  
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{$message}}</p>
        </div>  
    @endif
    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Website</th> 
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
        @foreach ($company as $val)
        <?php
        $i=1;
        ?>
            <tr>
                <td>{{$i++}}</td>
                <td>{{$val->name}}</td>
                <td>{{$val->email}}</td>
                <td>{{$val->website}}</td> 
                <td>{{$val->created_at}}</td>
                <td>
                    <form action="{{ route('companies.destroy',$val->id) }}" method="POST">

                        <a href="{{ route('companies.show',$val->id) }}" class="btn btn-success" title="show">
                            <i class="fas fa-eye fa-lg">Show</i>
                        </a>
                        
                        <a href="{{ route('companies.edit',$val->id) }}" class="btn btn-primary">
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

    {!! $company->links() !!}

@endsection