<h1>SalesIn</h1>
<h2>Informe sobre los usuarios</h2>
@foreach($ciclos as $ciclo)
    <p value="{{$ciclo->id}}">{{$ciclo->name}}</p>
@endforeach