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
                <div class="form-group">
                <div class="col-md-6">
                <label>What users do you want to see? </label>
                <form>
                <select id="filter" name="filter" class="form-control">
                    <option value="All">All</option>
                    <option value="1">Activate Users</option>
                    <option value="0">Non Activate Users</option>
                </select>
                
                </div>
                <div class="col-md-6">
                    <br>
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                </div>
                </form>
                
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-light table-hover">

                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Cicle</th>

                            <th>Email</th>
                            <th>Email verified at</th>

                            <th>Type</th>
                            <th>Offers</th>

                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>

                            <td>{{$user->name}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->find($user->id)->cicle->name}}</td>

                            <td>{{$user->email}}</td>
                            <td>{{$user->email_verified_at}}</td>

                            <td>{{$user->type}}</td>
                            <td>{{$user->num_offer_applied}}</td>

                            <td>
                                <form method="post" action="{{ url('/users/'.$user->id) }}" style="display:inline">
                                    {{csrf_field() }}
                                    @if ($user->activate == 1)
                                    <button class="btn btn-danger" type="submit">Desactivate</button>
                                    @else
                                    <button class="btn btn-success" type="submit">Activate</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->
@stop