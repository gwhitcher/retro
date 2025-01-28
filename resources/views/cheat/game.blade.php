@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $game->name }}</h1>
        <form method="post" action="{{ route('cheats-download') }}" enctype="multipart/form-data">
            @csrf

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
                    <th scope="col" data-field="code" data-sortable="true">Code</th>
                    <th scope="col" data-field="checkbox" data-sortable="true">Checkbox</th>
                </tr>
                </thead>
                <tbody>
                @foreach($codes as $code)
                    <tr>
                        <td>
                            {{ $code->id }}
                        </td>
                        <td>
                            {{ $code->name }}
                        </td>
                        <td>
                            @php
                                $code_fix = str_replace(' ', '<br/>', $code->code);
                            @endphp
                            {!! nl2br($code_fix) !!}
                        </td>
                        <td class="text-center">
                            <input type="checkbox" class="form-check-input" name="cheat[]" value="{{ $code->id }}" />
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="row my-3">
                <div class="col-sm-4 offset-8">
                    <div class="text-end">
                        <input type="hidden" name="game_id" value="{{ $game->id }}" />
                        <select name="type" class="form-control">
                            <option value="cht_ra">CHT (RetroArch)</option>
                            <option value="cht">CHT</option>
                            <option value="txt">TXT</option>
                            <option value="json">JSON</option>
                        </select>
                        <input type="submit" class="btn btn-sm btn-secondary my-3" name="submit" value="Save">
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
