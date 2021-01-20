<form action="{{url('pdfa')}}" method="post">
    <select name="ciclo" id="ciclo">
    @foreach($ciclos as $ciclo)
        <option value="{{$ciclo->id}}">{{$ciclo->name}}</option>
    @endforeach
    </select>
    <input type="submit" value="Generar pdf">
</form>