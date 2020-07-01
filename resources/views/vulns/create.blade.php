@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$category}} Database</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{route('store')}}">
                        {{csrf_field()}}
                        <input type='hidden' name='Category' value='{{$category}}'>
                        <div class="form-group{{ $errors->has('Titolo_ufficiale') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label"> TITOLO UFFICIALE: </label>
                                <div class="col-md-6">
                                    <input class="form-control"  type="text" name="Titolo_ufficiale">
                                    @if ($errors->has('Titolo_ufficiale'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Titolo_ufficiale') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('OWASP') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">OWASP:</label>
                                <div class="col-md-6">
                                    <input class="form-control"  type="text" name="OWASP">
                                    @if ($errors->has('OWASP'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('OWASP') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">GRAVITA':</label>
                            <div class="col-md-6">
                                <select  class="form-control" name='Gravità'>
                                    <option value='Critico'>CRITICO</option>
                                    <option value='Alto'>ALTO</option>
                                    <option value='Medio'>MEDIO</option>
                                    <option value='Basso'>BASSO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Descrizione') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">DESCRIZIONE:</label>
                                <div class="col-md-6">
                                    <textarea  class="form-control" name="Descrizione">Enter Description...</textarea>
                                    @if ($errors->has('Descrizione'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Descrizione') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Descrizione_en') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label"> ENGLISH DESCRIPTION:</label>
                                <div class="col-md-6">
                                    <textarea  class="form-control" name="Descrizione_en">Enter Description...</textarea>
                                    @if ($errors->has('Descrizione_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Descrizione_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Soluzione') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">SOLUZIONE:</label>
                                <div class="col-md-6">
                                    <textarea  class="form-control" name="Soluzione">Enter Solution...</textarea>
                                    @if ($errors->has('Soluzione'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Soluzione') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Soluzione_en') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label"> ENGLISH SOLUTION:</label>
                                <div class="col-md-6">
                                    <textarea  class="form-control" name="Soluzione_en">Enter Solution...</textarea>
                                    @if ($errors->has('Soluzione_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Soluzione_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('PoC') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">PROOF OF CONCEPT(PoC): </label>
                                <div class="col-md-6">
                                    <textarea  class="form-control" name="PoC">Enter Proof of Concept(PoC)...</textarea>
                                    @if ($errors->has('PoC'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('PoC') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('PoC_en') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">PROOF OF CONCEPT(PoC) ENG: </label>
                                <div class="col-md-6">
                                    <textarea  class="form-control" name="PoC_en">Enter Proof of Concept(PoC)...</textarea>
                                    @if ($errors->has('PoC_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('PoC_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
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