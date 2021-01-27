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
    <div class="form-group">
        <div class="col-md-1">
            <form action="{{url('pdfOffer')}}" method="get">
                <select name="year" id="year" class="form-control">
                @for ($i = 10; $i > 0; $i--)
                    <option>{{$now-$i}}</option>
                @endfor
                </select>

        </div>
    </div>
    <button type="submit" class="btn btn-info btn-flat">Generate pdf</button>
    </form>

</div>
<!-- End of Main Content -->
@stop