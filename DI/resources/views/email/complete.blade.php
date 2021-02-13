@extends('layouts.principal')
@section('title')
Página principal
@stop
@section('page-header')
<h1 class="h3 mb-0 text-gray-800">User Management</h1>
@stop
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box" style="border:1px solid #d2d6de;">
            <div class="box-header" style="background-color:#f5f5f5;border-bottom:1px solid #d2d6de;">
                <h2>Success.</h2>
            </div>
            <div class="box-body">
                <p>Your email has been sended successfully.</p>
                <a href="{{ route('enviarEmail') }}" class="btn btn-info btn-flat">Return</a>
                <a href="{{ url('/') }}" class="btn btn-primary btn-flat">Main Page</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->
@stop