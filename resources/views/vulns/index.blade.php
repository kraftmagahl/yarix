@extends('layouts.app')

@section('content')
    <table>
        <thead>
            <tr>
                <th>Titolo Ufficiale</th>
                <th>OWASP</th>
                <th>Gravità</th>
                <th></th>
            </tr>
        </thead>
        @foreach($vulns as $vuln)
        <tr>
            <th>{{$vuln->Titolo_ufficiale}}</th>
            <th>{{$vuln->OWASP}}</th>
            <th>{{$vuln->Gravità}}</th>
            <th><button><a href="{{url('/show')}}">Show</button>
        </tr>
        @endforeach
    </table>
@endsection