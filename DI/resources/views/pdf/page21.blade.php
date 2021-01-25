<form action="{{url('pdfb')}}" method="post">
    <select name="offer" id="offer">
    @foreach($offers as $offer)
        <option value="{{$offer->id}}">{{$offer->tittle}}</option>
    @endforeach
    </select>
    <input type="submit" value="Generar pdf">
</form>