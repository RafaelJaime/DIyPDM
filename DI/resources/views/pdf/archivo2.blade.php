<h1>SalesIn</h1>
<h2>Informe sobre los usuarios</h2>
<img src="{{ asset('logotipo.png') }}" alt="Logotipo del colegio">
<table border="1" class= "table table-light table-hover default">
    <thead class="thead-light">
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Cicle_Id</th>
            <th>Email</th>
        </tr>
    </thead>

    <tbody>
    @foreach($users as $user)
        <tr>

            <td>{{$user->name}}</td>
            <td>{{$user->surname}}</td>
            <td>{{$user->find($user->id)->cicle->name}}</td>
            <td>{{$user->email}}</td>
        </tr>
    @endforeach
    </tbody>
</table>