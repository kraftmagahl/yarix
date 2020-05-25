@extends('layouts.app')

@section('content')
<form method="post" action="/{{$vuln->id}}">
        {{csrf_field()}}
        <label> Titolo ufficiale: </label>
        <input type="text" name="Titolo_ufficiale" value="{{$vuln->Titolo_ufficiale}}">
        <label>OWASP:</label>
        <input type="text" name="OWASP" value="{{$vuln->OWASP}}">
        <p>Scegli la Gravità:</p>
        <select name='Gravità' value="{{$vuln->Gravità}}">
            <option value='Critico'>Critico</option>
            <option value='Alto'>Alto</option>
            <option value='Medio'>Medio</option>
            <option value='Basso'>Basso</option>
        </select>
        <label>Descrizione:</label><br>
        <textarea name="Descrizione">{{$vuln->Descrizione}}</textarea>
        <label>Soluzione:</label><br>
        <textarea name="Soluzione">{{$vuln->Soluzione}}</textarea>
        <label>Proof of Concept(PoC): </label><br>
        <textarea name="PoC">{{$vuln->PoC}}</textarea>
        <button type='submit'>SALVA</button>
    </form>
@endsection