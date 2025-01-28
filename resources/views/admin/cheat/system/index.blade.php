@extends('layouts.admin')

@section('content')
    <h1 class="h2 m-0 text-center text-md-start">Systems</h1>

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
        @foreach($systems as $system)
            <tr>
                <td>{{ $system->id }}</td>
                <td>{{ $system->name }}</td>
                <td>
                    <a class="btn btn-sm btn-warning text-white" href="{{ route('admin-cheat-system-edit', $system->id) }}">Edit</a>
                    <a class="btn btn-sm btn-danger text-white confirm" href="{{ route('admin-cheat-system-delete', $system->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
