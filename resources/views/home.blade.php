@extends('layouts.app')

@section('content')
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">WebApp Database</div>

                <div class="panel-body">
                    <form class="form-horizontal" method='get' action='{{route("search")}}'>
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type='text' class="form-control" name='Titolo_ufficiale' placeholder="...Search" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">Search!</button>
                                <button class="btn" ><a href="{{url('/create')}}"> Create!</button>
                                <button  class="btn"><a href="{{ url('/index') }}">List</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
