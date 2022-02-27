@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employees.index') }}" title="Go back"> <i class="fas fa-backward "></i> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li></li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.update',$employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="first_name" class="form-control"  value="{{ $employee->first_name }}" >
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" class="form-control"  value="{{ $employee->last_name }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control"   value="{{ $employee->email }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <input type="number" name="phone" class="form-control"   value="{{ $employee->phone }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>company:</strong> 
                    @foreach ($company as $val) 
                    <div class="form-group"> 
                      <select class="form-control" name="company" value="{{$employee->company}}"> 
                        <option value="{{$employee->company}}">{{$val->name}}</option>                        
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