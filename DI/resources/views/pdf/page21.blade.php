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
<form action="{{url('pdfb')}}" method="post">
    <select name="offer" id="offer">
    @foreach($offers as $offer)
        <option value="{{$offer->id}}">{{$offer->tittle}}</option>
    @endforeach
    </select>
    <input type="submit" value="Generar pdf">
</form>

</div>
<!-- End of Main Content -->
@stop