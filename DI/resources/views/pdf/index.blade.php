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
<a href="{{url('OffersByYear')}}" class="btn btn-info btn-flat">Offers Reports By Year</a>
<a href="{{url('OffersByCycle')}}" class="btn btn-info btn-flat">Offers By Cycles</a>

</div>
<!-- End of Main Content -->
@stop

