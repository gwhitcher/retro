@extends('layouts.admin')

@section('content')
    <h1 class="h2 m-0 text-center text-md-start">Pages</h1>

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
        @foreach($pages as $page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>{{ $page->title }}</td>
                <td>
                    <a class="btn btn-sm btn-info text-white" href="{{ url($page->slug) }}" target="_blank">View</a>
                    <a class="btn btn-sm btn-warning text-white" href="{{ route('admin-page-edit', $page->id) }}">Edit</a>
                    <a class="btn btn-sm btn-danger text-white confirm" href="{{ route('admin-page-delete', $page->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
