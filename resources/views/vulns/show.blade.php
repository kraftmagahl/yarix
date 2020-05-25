@extends('layouts.app')

@section('content')<div class="container">
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
                                <th>DESCRIZIONE</th>
                                <th>SOLUZIONE</th>
                                <th>PoC</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>{{$vuln->Titolo_ufficiale}}</th>
                            <th>{{$vuln->OWASP}}</th>
                            <th>{{$vuln->Gravità}}</th>
                            <th>{{$vuln->Descrizione}}</th>
                            <th>{{$vuln->Soluzione}}</th>
                            <th>{{$vuln->PoC}}</th>
                        </tr>
                    </table>
                    <button class="btn">Copy</button>
                </div>
            </div>
        </div>
    </div>
 </div>

@endsection