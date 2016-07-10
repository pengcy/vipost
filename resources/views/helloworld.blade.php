@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
           <!-- Display Validation Errors -->
            @include('common.errors')

			<div class="alert alert-success" role="alert">{{ $message }}</div>
        </div>
    </div>
@endsection
