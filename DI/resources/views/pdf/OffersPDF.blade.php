<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>SalesIn</h1>
    <h2>Offers By Cycle</h2>
    <table border="1" class="table table-light table-hover default">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Headline</th>
                <th>Description</th>
                <th>Cicle_Id</th>
                <th>Date_Max</th>
                <th>Num_Candidates</th>
            </tr>
        </thead>

        <tbody>
            @foreach($offers as $offer)
            <tr>
                <td>{{$offer->id}}</td>
                <td>{{$offer->headline}}</td>
                <td>{{$offer->description}}</td>
                <td>{{$offer->cicle_id}}</td>
                <td>{{$offer->date_max}}</td>
                <td>{{$offer->num_candidates}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>