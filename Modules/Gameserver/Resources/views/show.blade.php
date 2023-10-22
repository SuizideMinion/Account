@extends('gameserver::layouts.master')

@section('content')

{{--    <br>--}}
{{--    <h5>Neuen Server Erstellen:</h5>--}}
{{--    <table class="table table-sm">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th scope="col">#</th>--}}
{{--            <th scope="col">Name</th>--}}
{{--            <th scope="col">Beschreibung</th>--}}
{{--            <th scope="col">Farbe</th>--}}
{{--            <th scope="col">Image</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        <tr>--}}
{{--            <th scope="row"--}}
{{--                onclick='location.href="{{ route('gameserver.index', ["edit" => $Game->id]) }}"'>{{ $Game->id }}</th>--}}
{{--            <td>{{ $Game->name }}</td>--}}
{{--            <td>{{ $Game->desc }}</td>--}}
{{--            <td>{{ $Game->color }}</td>--}}
{{--            <td>{{ $Game->image }}</td>--}}
{{--        </tr>--}}
{{--    </table>--}}

    <h5>Serverlist:</h5>
    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Beschreibung</th>
            <th scope="col">Tag</th>
            <th scope="col">Host</th>
        </tr>
        </thead>
        <tbody>
        @foreach($GameServers as $GameServer)
        <tr>
            <th scope="row"
                onclick='location.href="{{ route('gameserver.show', $GameServer->id) }}"'>{{ $GameServer->id }}</th>
            <td>{{ $GameServer->name }}</td>
            <td>{{ $GameServer->desc }}</td>
            <td>{{ $GameServer->tag }}</td>
            <td>{{ $GameServer->host }}</td>
        </tr>
        @endforeach
    </table>


    <br>
    <h5>Game Bearbeiten:</h5>
    {{ BsForm::model($Game, route('game.update', $Game->id)) }}
    {{ BsForm::text('name')->placeholder('name')->value($Game->name)->required() }}
    {{ BsForm::text('desc')->placeholder('desc')->value($Game->desc)->required() }}
    {{ BsForm::text('color')->placeholder('color')->value($Game->color)->required() }}
    {{ BsForm::text('image')->placeholder('image')->value($Game->image)->required() }}
    {{ BsForm::submit('Click Me!')->primary() }}
    {{ BsForm::close() }}
    <br>
    <h5>Neuen Server Erstellen:</h5>
    {{ BsForm::post('gameserver') }}
    {{ BsForm::text('name')->placeholder('name')->required() }}
    {{ BsForm::text('tag')->placeholder('tag')->required() }}
    {{ BsForm::text('wt')->placeholder('wt') }}
    {{ BsForm::text('kt')->placeholder('kt') }}
    {{ BsForm::text('desc')->placeholder('desc')->required() }}
    {{ BsForm::text('host')->placeholder('host')->required() }}
    {{ BsForm::text('url')->placeholder('url')->required() }}
    {{ BsForm::text('payserver')->placeholder('payserver')->required() }}
    {{ BsForm::text('lang')->placeholder('lang')->required() }}
    {{ BsForm::text('database')->placeholder('database')->required() }}
    {{ BsForm::text('database_host')->placeholder('database_host')->required() }}
    {{ BsForm::text('database_username')->placeholder('database_username')->required() }}
    {{ BsForm::text('database_password')->placeholder('database_password')->required() }}
    {{ BsForm::text('user_data_table')->placeholder('user_data_table')->required() }}
    {{ BsForm::text('game_id')->placeholder('game_id')->value($Game->id)->required() }}
    {{ BsForm::submit('Click Me!')->primary() }}
    {{ BsForm::close() }}
@endsection
