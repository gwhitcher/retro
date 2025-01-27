@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">
                {{ $topic->title }}
            </div>
            <div class="card-body">
                @if(!empty($topic->content))
                    {{ $topic->content }}
                @endif

                @foreach($posts as $post)
                    <div class="card card-body mb-3">
                        <div class="row">
                            <div class="col-sm-2">
                                @php
                                $user = \App\Models\UserAdmin::getSingle($post->user_id);
                                @endphp
                                {{ $user->name }}
                            </div>
                            <div class="col-sm-10">
                                {{ $post->content }}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
