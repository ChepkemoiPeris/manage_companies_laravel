@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Company</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('companies.index') }}" title="Go back"> <i class="fas fa-backward "></i> Back</a>
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

    <form action="{{ route('companies.update',$company->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control"  value="{{ $company->name }}" >
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="last_name" class="form-control"  value="{{ $company->email }}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Website:</strong>
                    <input type="text" name="website" class="form-control"   value="{{ $company->website }}">
                </div>
            </div>
             
            
            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection