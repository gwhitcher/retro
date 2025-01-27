@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($forums as $forum)
            <div class="card mb-3">
                <div class="card-header">
                    {{ $forum->title }}
                </div>
                <div class="card-body">
                    @if(!empty($forum->content))
                        {{ $forum->content }}
                    @endif

                    @php
                    $categories = \App\Models\ForumCategory::getAllByForumID($forum->id);
                    @endphp
                    <div class="list-group">
                        @foreach($categories as $category)
                            <a class="list-group-item" href="{{ route('forum-category', $category->id) }}">
                                {{ $category->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
