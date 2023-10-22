@extends('gameserver::layouts.master')

@section('content')

    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Beschreibung</th>
            <th scope="col">Farbe</th>
            <th scope="col">Image</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Games as $Game)
            <tr>
                <th scope="row"
                    onclick='location.href="{{ route('game.show', $Game->id) }}"'>{{ $Game->id }}</th>
                <td>{{ $Game->name }}</td>
                <td>{{ $Game->desc }}</td>
                <td>{{ $Game->color }}</td>
                <td>{{ $Game->image }}</td>
            </tr>
        @endforeach
    </table>


    {{ BsForm::post('game') }}
    {{ BsForm::text('name')->placeholder('name')->required() }}
    {{ BsForm::text('desc')->placeholder('desc')->required() }}
    {{ BsForm::text('color')->placeholder('color')->required() }}
    {{ BsForm::text('image')->placeholder('image')->required() }}
    {{ BsForm::submit('Click Me!')->primary() }}
    {{ BsForm::close() }}
@endsection
