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
<form action="{{url('pdfOffer')}}" method="post">
    <select name="year" id="year">
    @foreach($years as $year)
        <option value="{{$year->date_max}}">{{$year->date_max}}</option>
    @endforeach
    </select>
    <a href="{{url('pdfOffer')}}">Generate pdf</a>
</form>

</div>
<!-- End of Main Content -->
@stop