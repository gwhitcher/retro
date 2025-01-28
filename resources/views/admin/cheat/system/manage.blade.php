@extends('layouts.admin')

@section('content')
    <div class="card shadow w-100 border-0">
        <div class="card-header bg-secondary-subtle border-0">
            <h1 class="h2 m-0 text-center text-md-start">@if($edit) {{ __('Edit') }} @else {{ __('Add') }} @endif</h1>
        </div>
        <div class="card-body">

            <form method="POST" action="@if($edit){{ route('admin-page-edit', $page->id) }}@else{{ route('admin-page-add') }}@endif">

                @csrf

                <div class="form-group row mb-3">
                    <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}<span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input class="form-control" name="title" id="title" value="@if($edit){{__($page->title)}}@endif" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="content" class="col-md-2 col-form-label text-md-right">{{ __('Content') }}</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="content" id="content">@if($edit){{__($page->content)}}@endif</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12 text-end">
                        <input type="submit" name="submit" id="submit" class="btn btn-sm btn-secondary" value="Submit" />
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
