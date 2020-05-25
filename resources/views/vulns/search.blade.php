@extends('layouts.app')
@section('content')
<div class='container'>
    <table>
            <thead>
                <tr>
                    <th>Titolo Ufficiale</th>
                    <th>OWASP</th>
                    <th>Gravità</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            @foreach($vulns as $vuln)
            <tr>
                <th>{{$vuln->Titolo_ufficiale}}</th>
                <th>{{$vuln->OWASP}}</th>
                <th>{{$vuln->Gravità}}</th>
                <th><button><a href="{{url('/show/'.$vuln->id)}}">Show</button>
                <th><button><a href="{{url('/edit/'.$vuln->id)}}">Edit</button>
            </tr>
            @endforeach
    </table>
   </div>
@endsection
