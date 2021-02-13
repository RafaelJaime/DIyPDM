@extends('layouts.principal')
@section('title')
Página principal
@stop
@section('page-header')
<h1 class="h3 mb-0 text-gray-800">"SalesIn" - Web and App for Job Offers Management</h1>
@stop
@section('content')

<!-- Begin Page Content -->
        <div class="box-header" style="background-color:#f5f5f5;border-bottom:1px solid #d2d6de;">
                <div class="form-group">
                <div class="col-md-6">
                <label>Select a cicle</label>
                <form action="{{url('UsersByOffer')}}" method="get">
                <select name="cicle_id" id="cicle_id" class="form-control">
                    @foreach($cicles as $cicle)
                    <option value="{{$cicle->id}}">{{$cicle->id}} | {{$cicle->name}}</option>
                    @endforeach
                </select>
                </div>
                <br>
                <button type="submit" class="btn btn-info btn-flat">Go to Offers By Cicle</button>
                </form>
                </div>
                </div>
<!-- End of Main Content -->
@stop