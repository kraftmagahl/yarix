@extends('layouts.app')

@section('content')
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">WebApp Database</div>

                <div class="search-db">
                    <form method='post' action='/search'>
                        {{csrf_field()}}
                        <input type='text' name='Descrizione'placeholder="...Search">
                    </form>
                        <div class='search'>
                             <button type="submit"><a href="{{url('/search')}}"> Search!</button>
                        </div>
                    <button><a href="{{url('/create')}}"> Create!</button>
                    <button ><a href="{{ url('/index') }}">List</button>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
