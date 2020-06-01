@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$category}} Database</div>

                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#ita">ITA</a></li>
                        <li><a data-toggle="tab" href="#en">EN</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="ita" class="tab-pane fade in active"> 
                            <table class="table">
                                <tr>
                                    <th>TITOLO UFFICIALE</th> 
                                    <th id="titolo_ufficiale">{{$vuln->Titolo_ufficiale}}</th>
                                </tr>
                                <tr>
                                    <th>OWASP</th> 
                                    <th  id="categoria">{{$vuln->OWASP}}</th>
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
                                    <th>SOLUZIONE</th> 
                                    <th>{{$vuln->Soluzione}}</th>
                                </tr>
                                <tr>
                                    <th>PoC</th>
                                    <th>{{$vuln->PoC}}</th>
                                </tr>    
                            </table>
                        </div>
                        <div id="en" class="tab-pane fade">
                            <table class="table">
                                <tr>
                                    <th>TITOLO UFFICIALE</th> 
                                    <th id="titolo_ufficiale">{{$vuln->Titolo_ufficiale}}</th>
                                </tr>
                                <tr>
                                    <th>OWASP</th> 
                                    <th  id="categoria">{{$vuln->OWASP}}</th>
                                </tr>
                                <tr>
                                    <th>GRAVITA'</th> 
                                    @if(strcasecmp($vuln->Gravità, "Critico") == 0)
                                        <th id="gravità">VERY HIGH</th>
                                    @elseif(strcasecmp($vuln->Gravità, "Alto") == 0)
                                        <th id="gravità">HIGH</th>
                                    @elseif(strcasecmp($vuln->Gravità, "Medio") == 0)
                                        <th id="gravità">MEDIUM</th>
                                    @elseif(strcasecmp($vuln->Gravità, "Basso") == 0)
                                        <th id="gravità">LOW</th>
                                    @endif
                                </tr>
                                <tr>
                                    <th>DESCRIPTION</th>
                                    <th>{{$vuln->Descrizione_en}}</th>
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
                        </div>
                    </div>
                    <button class="btn btn-primary"  onclick="copyToClipboard('#gravità','#categoria','#titolo_ufficiale')">Copy</button>
                    <div class="col-md-10">
                        <form class="form-horizontal" method="get" action='{{route("home")}}'>
                                {{csrf_field()}}
                                <input type='hidden' name='Category' value='{{$category}}'>
                                <button class="btn" type="submit" href="/home">Vai a Home</button>
                        </form>
                    </div>
                    <script>
                        function copyToClipboard(element,element1,element2) {
                            var $temp = $("<input>");
                            $("body").append($temp);
                            $temp.val($(element).text()+"   "+$(element1).text().substring(0,2)+"  "+$(element2).text()).select();
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