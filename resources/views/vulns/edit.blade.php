@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$category}} Database</div>
                <div class="panel-body">
                    <form class="form-horizontal" form method="post" action="/{{$vuln->id}}">
                        {{csrf_field()}}
                        <input type='hidden' name='Category' value='{{$category}}'>
                        <div class="form-group">
                            <label class="col-md-4 control-label"> TITOLO UFFICIALE: </label>
                            <div class="col-md-6">
                                <input class="form-control"  type="text" name="Titolo_ufficiale" value="{{$vuln->Titolo_ufficiale}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">OWASP:</label>
                            <div class="col-md-6">
                                <input class="form-control" value="{{$vuln->OWASP}}" type="text" name="OWASP">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">GRAVITA':</label>
                            <div class="col-md-6">
                                <select  class="form-control" name='Gravità'>
                                    <option selected="selected">{{$vuln->Gravità}}</option>
                                    <option value='Critico'>CRITICO</option>
                                    <option value='Alto'>ALTO</option>
                                    <option value='Medio'>MEDIO</option>
                                    <option value='Basso'>BASSO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">DESCRIZIONE:</label>
                            <div class="col-md-6">
                                <textarea rows="10" class="form-control" name="Descrizione" >{{$vuln->Descrizione}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">ENGLISH DESCRIPTION:</label>
                            <div class="col-md-6">
                                <textarea rows="10" class="form-control" name="Descrizione_en" >{{$vuln->Descrizione_en}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">SOLUZIONE:</label>
                            <div class="col-md-6">
                                <textarea rows="10"  class="form-control" name="Soluzione">{{$vuln->Soluzione}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">ENGLISH SOLUTION:</label>
                            <div class="col-md-6">
                                <textarea rows="10"  class="form-control" name="Soluzione_en">{{$vuln->Soluzione_en}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">PROOF OF CONCEPT(PoC): </label>
                            <div class="col-md-6">
                                <textarea rows="10"  class="form-control" name="PoC">{{$vuln->PoC}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">SALVA</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection