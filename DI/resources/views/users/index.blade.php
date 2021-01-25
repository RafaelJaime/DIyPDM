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
    <!-- Page Heading -->
    

    <!-- Content Row -->
    <select id="activate" name="filter">activate
        <option value="">All</option>
        <option value="1">Activate Users</option>
        <option value="0">Non Activate Users</option>
    </select>

    <table class= "table table-light table-hover">
        
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Cicle_Id</th>
                
                <th>Email</th>
                <th>Email verified at</th>

                <th>Type</th>
                <th>Num_Offers_Applied</th>

                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>

                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->cicle_id}}</td>

                <td>{{$user->email}}</td>
                <td>{{$user->email_verified_at}}</td>

                <td>{{$user->type}}</td>
                <td>{{$user->num_offer_applied}}</td>

                <td>Activate | 
                
                <form method="post" action="{{ url('/users/'.$user.id) }}"> 
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                </form></td>
            </tr>
        @endforeach
        </tbody>
    </table>
<a href="{{ url('/') }}">Go Back</a>
</div>
<!-- End of Main Content -->
@stop