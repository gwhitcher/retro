@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cheats</h1>
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
            </tr>
            </thead>
            <tbody>
            @foreach($systems as $system)
                <tr>
                    <td>
                        {{ $system->id }}
                    </td>
                    <td>
                        <a href="{{ route('cheats-systems', $system->id) }}">
                            {{ $system->name }}
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
