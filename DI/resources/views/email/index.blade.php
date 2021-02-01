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
                <h2>Formulario de envio de email.</h2>
            </div>
            <div class="box-body">
                <form action="{{route ('envioEmail')}}" method="get">
                <label for="to">To: </label>
                <input type="text" name="to">
                <br>
                <label for="subject" size=500>Subject: </label>
                <input type="text" name="subject">
                <br>
                <label for="contenido">Content of the mail: </label>
                <textarea name="contenido" cols="30" rows="10"></textarea>
            <hr>
                <button type="submit" class="btn btn-info btn-flat">Send email</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->
@stop