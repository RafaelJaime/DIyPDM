<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <img style="float: right;" src="img/logotipo.png">
    <h1>SalesIn</h1>
    <h2>Users by Offers</h2>
    <table border="1" class="table table-light table-hover default">
        <thead class="thead-light">
            <tr> 
                <th>ID</th>  
                <th>Name</th>
                <th>Surname</th>
                <th>Cicle</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
            @foreach($applieds as $applied)
            <tr>
                <td>{{$applied->user->id}}</td>
                <td>{{$applied->user->name}}</td>
                <td>{{$applied->user->surname}}</td>
                <td>{{$applied->user->find($applied->id)->cicle->name}}</td>
                <td>{{$applied->user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>