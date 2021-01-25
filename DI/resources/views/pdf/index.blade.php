@extends('layouts.principal')
@section('title')
Página principal
@stop
@section('page-header')
<h1 class="h3 mb-0 text-gray-800">"SalesIn" - Web and App for Job Offers Management</h1>
@stop
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
<a href="{{url('pdf1')}}">Pulsa aquí para primer pdf</a>
<a href="{{url('pdf2')}}">Pulsa aquí para segundo pdf</a>

</div>
<!-- End of Main Content -->
@stop

