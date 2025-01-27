@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">
                {{ $category->title }}
            </div>
            <div class="card-body">
                @if(!empty($category->content))
                    {{ $category->content }}
                @endif

                <div class="list-group">
                    @foreach($topics as $topic)
                        <a class="list-group-item" href="{{ route('forum-topic', $topic->id) }}">
                            {{ $topic->title }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
