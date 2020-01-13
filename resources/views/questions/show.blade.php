@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h3>{{ $question->title }}</h3>
                    <a class="btn btn-outline-secondary" href="{{ route('questions.index')}}">Back to all questions</a>
                </div>

                <div class="card-body">

                    <div class="media mt-2">
                        <div class="media-left mr-4">
                            <div class="d-flex flex-column votes-controls">

                                <a title="Vote up" href="#" class="votes-up">
                                    <i class="fas fa-caret-up fa-3x"></i>
                                </a>
                                <span class="votes-count">123</span>
                                <a title="Vote down" href="#" class="votes-down off">
                                    <i class="fas fa-caret-down fa-3x"></i>
                                </a>
                                <a title="Mark as favorite" onClick="event.preventDefault();document.getElementById('favorite-form-{{ $question->id }}').submit()" class="favorite {{ Auth::guest()?'off':($question->is_favorited ?'favorited':'')  }} d-flex flex-column">
                                        <i class="fas fa-star fa-2x mb-2 "></i>
                                        <span class="favorites-count text-muted">123</span>
                                </a>
                                <form id="favorite-form-{{ $question->id }}" action="{{ route('questions.favorite',$question) }}" method="post" style="display: none">
                                        @csrf
                                        @if ($question->is_favorited)
                                            @method('delete')
                                        @endif
                                </form>

                            </div>
                        </div>
                        <div class="media-body">
                                {!! nl2br(e($question->body),false) !!}
                        </div>
                    </div>


                    <div>
                        <div class="mt-2 d-flex flex-column">
                            <span class="text-muted"> Asked {{ $question->created_date }}</span>

                            <div class="media mt-2">
                                <div class="media-left mr-2">
                                    <img src="{{ $question->user->profile->avatar }}" class="media-object rounded-circle" width='40' height="40">
                                </div>
                                <div class="media-body mt-2">
                                     <a class="author" href="{{ $question->user->url }}">  {{ $question->user->name}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('answers._index',[
        'answers'=>$question->answers,
        'answers_count'=>$question->answers_count
        ])

    @include('answers._create',[
        'question'=>$question
    ])

</div>
@endsection
