@extends('gameserver::layouts.master')

@section('content')
    @foreach($Games as $Game)
    <div class="container">
        <div class="row">
        @foreach($Game->gameServers as $Server)
            <div class="col" style="
                min-width:300px;
                height: 188px;
                border-radius: 20px;
                background-image: linear-gradient(rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.7)), url(/images/{{ $Game->image }});
                padding: 10px;
                margin: 10px;
                background-size: cover;
                text-align:center;
                color: black;
                ">
                <h5>{{ $Server->tag }}</h5>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
@endsection
