@extends('layouts.app')

@section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Choose your Database: </div>

                    <div class="panel-body">
                        <form class="form-horizontal" method='get' action='{{route("home")}}'>
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-md-6">
                                    <select  class="form-control" name='Category'>
                                        @foreach($categories as $category)
                                            <option>{{$category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group"style='float: left; padding: 5px;'>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-primary" >INVIA!</button>
                                </div>
                            </div>
                        </form>
                    <div style='float: left; padding: 5px;'>
                        <form class="form-horizontal" method="get" action='{{route("category")}}'>
                            {{csrf_field()}}
                            @foreach($categories as $category)
                                <input type='hidden' name='categories[]' value='{{$category}}'>
                            @endforeach
                            <button type="submit" class="btn" href="{{url('/new_category')}}">Create New Category!</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
