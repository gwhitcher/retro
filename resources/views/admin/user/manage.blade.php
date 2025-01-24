@extends('layouts.admin')

@section('content')
    <div class="card shadow w-100 border-0">
        <div class="card-header bg-secondary-subtle border-0">
            <h1 class="h2 m-0 text-center text-md-start">@if($edit) {{ __('Edit') }} @else {{ __('Add') }} @endif</h1>
        </div>
        <div class="card-body">

            <form method="POST" action="@if($edit){{ route('admin-user-edit', $user->id) }}@else{{ route('admin-user-add') }}@endif" autocomplete="off">

                @csrf

                <div class="form-group row mb-3">
                    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}<span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input class="form-control" name="name" id="name" value="@if($edit){{__($user->name)}}@endif" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}<span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input class="form-control" type="email" name="email" id="email" value="@if($edit){{__($user->email)}}@endif" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div class="col-md-10">
                        <input class="form-control" type="password" name="password" id="password" value="" autocomplete="off">
                        <div class="fst-italic small">Leave blank to keep old password.</div>
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
