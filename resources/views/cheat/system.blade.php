@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $system->name }}</h1>
        <table
            id="table"
            data-pagination="false"
            data-search="true"
            data-show-toggle="false"
            data-toolbar=".toolbar"
            data-use-row-attr-func="true"
            data-reorderable-rows="false"
            class="table table-hover mb-3 bootstrap-tables">
            <thead class="bg-secondary-subtle">
            <tr>
                <th scope="col" data-field="id" data-sortable="true">#</th>
                <th scope="col" data-field="name" data-sortable="true">Name</th>
                <th scope="col" data-field="device" data-sortable="true">Device</th>
            </tr>
            </thead>
            <tbody>
            @foreach($games as $game)
                <tr>
                    <td>
                        {{ $game->id }}
                    </td>
                    <td>
                        <a href="{{ route('cheats-game', $game->id) }}">
                            {{ $game->name }}
                        </a>
                    </td>
                    <td>
                        @php
                        $device = \App\Models\Cheat::getDevice($game->device_id);
                        @endphp
                        {{ $device->name }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
