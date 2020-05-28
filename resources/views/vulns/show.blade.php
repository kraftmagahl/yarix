@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$category}} Database</div>

                <div class="panel-body">
                    <table class="table">
                            <tr>
                                <th>TITOLO UFFICIALE</th> 
                                <th>{{$vuln->Titolo_ufficiale}}</th>
                            </tr>
                            <tr>
                                <th>OWASP</th> 
                                <th  id="gravità">{{$vuln->OWASP}}</th>
                            </tr>
                            <tr>
                                <th>GRAVITA'</th> 
                                <th id="gravità">{{$vuln->Gravità}}</th>
                            </tr>
                            <tr>
                                <th>DESCRIZIONE</th>
                                <th>{{$vuln->Descrizione}}</th>
                            </tr>
                            <tr>
                                <th>DESCRIPTION</th>
                                <th>{{$vuln->Descrizione_en}}</th>
                            </tr>
                            <tr>
                                <th>SOLUZIONE</th> 
                                <th>{{$vuln->Soluzione}}</th>
                            </tr>
                            <tr>
                                <th>SOLUTION</th>
                                <th>{{$vuln->Soluzione_en}}</th>
                            </tr>
                            <tr>
                                <th>PoC</th>
                                <th>{{$vuln->PoC}}</th>
                            </tr>    
                    </table>
                    <button class="btn btn-primary"  onclick="copyToClipboard('#gravità')">Copy</button>
                    <script>
                        function copyToClipboard(element) {
                            var $temp = $("<input>");
                            $("body").append($temp);
                            $temp.val($(element).text()).select();
                            document.execCommand("copy");
                            $temp.remove();
                            }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection