@extends('layouts.admin')

@section('content')
    <h1 class="h2 m-0 text-center text-md-start">Games</h1>

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
            <th scope="col" data-field="title" data-sortable="true">Title</th>
            <th scope="col">Manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($games as $game)
            <tr>
                <td>{{ $game->id }}</td>
                <td>{{ $game->name }}</td>
                <td>
                    <a class="btn btn-sm btn-warning text-white" href="{{ route('admin-cheat-game-edit', $game->id) }}">Edit</a>
                    <a class="btn btn-sm btn-danger text-white confirm" href="{{ route('admin-cheat-game-delete', $game->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="my-3">
        {{ $games->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>
@endsection
