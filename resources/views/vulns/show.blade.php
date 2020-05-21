@extends('layouts.app')

@section('content')
    <table>
        <thead>
            <tr>
                <th>Titolo Ufficiale</th>
                <th>OWASP</th>
                <th>Gravità</th>
                <th>Descrizione</th>
                <th>Soluzione</th>
                <th>PoC</th>
                <th></th>
            </tr>
        </thead>
        <tr>
            <th>{{$vuln->Titolo_ufficiale}}</th>
            <th>{{$vuln->OWASP}}</th>
            <th>{{$vuln->Gravità}}</th>
            <th>{{$vuln->Descrizione}}</th>
            <th>{{$vuln->Soluzione}}</th>
            <th>{{$vuln->PoC}}</th>
            <th><button>Copy</button>
        </tr>
    </table>
@endsection