@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-danger">{{Session::get('errorMsg')}}</h1>
        </div>
    </div>
@endsection