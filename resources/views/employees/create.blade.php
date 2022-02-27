@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('employee') }}" title="Go back"> <i class="fas fa-backward "></i>Go back </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div> 
    
    @endif
    <form action="{{ route('employees.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="first_name" class="form-control" placeholder="First Name">
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <input type="number" name="phone" class="form-control" placeholder="Phone Number">
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>company:</strong>
                    @foreach ($company as $val) 
                    <div class="form-group"> 
                      <select class="form-control" name="company" >
                        <option>Select Company</option> 
                        <option value="{{$val->id}}">{{$val->name}}</option>                        
                      </select>
                    </div>
                    @endforeach 
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection