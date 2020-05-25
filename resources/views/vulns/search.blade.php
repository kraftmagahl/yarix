@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">WebApp Database</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>TITOLO UFFICIALE</th>
                                <th>OWASP</th>
                                <th>GRAVITA'</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach($vulns as $vuln)
                        <tr>
                            <th>{{$vuln->Titolo_ufficiale}}</th>
                            <th>{{$vuln->OWASP}}</th>
                            <th>{{$vuln->Gravità}}</th>
                            <th><button class="btn"><a href="{{url('/show/'.$vuln->id)}}">Show</button>
                            <th><button class="btn"><a href="{{url('/edit/'.$vuln->id)}}">Edit</button>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
