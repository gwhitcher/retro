@extends('layouts.admin')

@section('content')
    <h1 class="h2 m-0 text-center text-md-start">Users</h1>

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
            <th scope="col" data-field="email" data-sortable="true">Email</th>
            <th scope="col">Manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a class="btn btn-sm btn-warning text-white" href="{{ route('admin-user-edit', $user->id) }}">Edit</a>
                    <a class="btn btn-sm btn-danger text-white confirm" href="{{ route('admin-user-delete', $user->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
