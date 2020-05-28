@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Database</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{route('save')}}">
                        {{csrf_field()}}
                        @foreach($categories as $category)
                            <input type='hidden' name='categories[]' value='{{$category}}'>
                        @endforeach
                        <div class="form-group">
                            <label class="col-md-4 control-label"> NOME TABELLA: </label>
                            <div class="col-md-6">
                                <input class="form-control"  type="text" name="tablename">
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" href="/save">SALVA</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection