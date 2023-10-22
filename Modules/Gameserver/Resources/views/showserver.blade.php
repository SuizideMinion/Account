@extends('gameserver::layouts.master')

@section('content')

    <br>
    <h5>Server Bearbeiten:</h5>
    {{ BsForm::model($Server, route('gameserver.update', $Server->id)) }}
    {{ BsForm::text('name')->placeholder('name')->value($Server->name)->required() }}
    {{ BsForm::text('tag')->placeholder('tag')->value($Server->tag)->required() }}
    {{ BsForm::text('wt')->placeholder('wt')->value($Server->wt) }}
    {{ BsForm::text('kt')->placeholder('kt')->value($Server->kt) }}
    {{ BsForm::text('desc')->placeholder('desc')->value($Server->desc)->required() }}
    {{ BsForm::text('host')->placeholder('host')->value($Server->host)->required() }}
    {{ BsForm::text('url')->placeholder('url')->value($Server->url)->required() }}
    {{ BsForm::text('payserver')->placeholder('payserver')->value($Server->payserver)->required() }}
    {{ BsForm::text('lang')->placeholder('lang')->value($Server->lang)->required() }}
    {{ BsForm::text('database')->placeholder('database')->value($Server->database)->required() }}
    {{ BsForm::text('database_host')->placeholder('database_host')->value($Server->database_host)->required() }}
    {{ BsForm::text('database_username')->placeholder('database_username')->value($Server->database_username)->required() }}
    {{ BsForm::text('database_password')->placeholder('database_password')->value($Server->database_password)->required() }}
    {{ BsForm::text('user_data_table')->placeholder('user_data_table')->value($Server->user_data_table)->required() }}
    {{ BsForm::text('game_id')->placeholder('game_id')->value($Server->game_id)->required() }}
    {{ BsForm::submit('Click Me!')->primary() }}
    {{ BsForm::close() }}
@endsection
