@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kanye's Quotes</div>
                <div class="card-body">
                    @foreach ($quotes as $q)
                   {{$q}}
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection