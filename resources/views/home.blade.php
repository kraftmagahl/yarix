@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">WebApp Database</div>

                <div class="search-db">
                    <input type='text' id='db_search'placeholder="...Search">
                    <div class='search'>
                    <button type="submit" class="btn btn-search"> Search!</button>
                    </div>
                    <button class="btn btn-search"> Add!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
