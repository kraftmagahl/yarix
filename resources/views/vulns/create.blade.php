@extends('layouts.app')

@section('content')
    <form method="post" action="{{route('store')}}">
        {{csrf_field()}}
        <label> Titolo ufficiale: </label>
        <input type="text" name="Titolo_ufficiale">
        <label>OWASP:</label>
        <input type="text" name="OWASP">
        <p>Scegli la Gravità:</p>
        <select name='Gravità'>
            <option value='Critico'>Critico</option>
            <option value='Alto'>Alto</option>
            <option value='Medio'>Medio</option>
            <option value='Basso'>Basso</option>
        </select>
        <label>Descrizione:</label><br>
        <textarea name="Descrizione">Enter Description...</textarea>
        <label>Soluzione:</label><br>
        <textarea name="Soluzione">Enter Solution...</textarea>
        <label>Proof of Concept(PoC): </label><br>
        <textarea name="PoC">Enter Proof of Concept(PoC)...</textarea>
        <button type='submit'>SALVA</button>
    </form>

@endsection