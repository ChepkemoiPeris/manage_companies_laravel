@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                <button type='button' class='btn btn-success'> <a href="{{ route('companies.index') }}" style="color:black" >Companies</a></button><br><br>
                  <button type='button' class='btn btn-success'>  <a href="{{ route('employees.index') }}" style="color:black">Employees</a></button>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection