@extends('layouts.app')

@section('content')
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">WebApp Database</div>

                <div class="search-db">
                    <form method='get' action='{{route("search")}}'>
                        {{csrf_field()}}
                        <input type='text' name='Titolo_ufficiale' placeholder="...Search" >
                        <button type="submit"> Search!</button>
                    </form>
                    <button><a href="{{url('/create')}}"> Create!</button>
                    <button ><a href="{{ url('/index') }}">List</button>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
