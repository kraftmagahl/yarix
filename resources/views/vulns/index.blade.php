@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$category}} Database</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>TITOLO UFFICIALE</th>
                                <th>OWASP</th>
                                <th>GRAVITA'</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vulns as $vuln)
                            <tr>
                                <th id="Titolo_ufficiale">{{$vuln->Titolo_ufficiale}}</th>
                                <th id="category">{{$vuln->OWASP}}</th>
                                <th id="gravity">{{$vuln->Gravità}}</th>
                                <th>
                                    <form class="form-horizontal" method="get" action='{{route("show")}}'>
                                        {{csrf_field()}}
                                        <input type='hidden' name='Category' value='{{$category}}'>
                                        <input type='hidden' name='id' value='{{$vuln->id}}'>
                                        <button type="submit" class="btn"href="{{url('/show')}}">Show</button>
                                    </form>
                                <th>
                                    <form class="form-horizontal" method="get" action='{{route("edit")}}'>
                                        {{csrf_field()}}
                                        <input type='hidden' name='Category' value='{{$category}}'>
                                        <input type='hidden' name='id' value='{{$vuln->id}}'>
                                        <button class="btn" href="{{url('/edit/'.$vuln->id)}}">Edit</button>
                                    </form>
                                </th>
                                <!--<th>
                                    <button class="btn"  onclick="copyToClipboard( '#gravity','#category','#Titolo_ufficiale')">Copy</button>
                                </th>-->
                            </tr>
                            <script>
                                function copyToClipboard(element,element1,element2) {
                                    var $temp = $("<input>");
                                    $("body").append($temp);
                                    $temp.val($(element).text()+"   "+$(element1).text().substring(0,2)+"  "+$(element2).text()).select();
                                    document.execCommand("copy");
                                    $temp.remove();
                                }
                            </script>
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection