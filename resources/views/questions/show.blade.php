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
                                <a title="Vote down" href="#" class="votes-down p-0 m-0">
                                    <i class="fas fa-caret-down fa-3x p-0 m-0"></i>
                                </a>
                                <a title="Mark as favorite" href="#" class="favorite d-flex flex-column">
                                        <i class="fas fa-star fa-2x mb-2"></i>
                                        <span class="favorites-count text-muted">123</span>
                                </a>

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
                                     <a href="{{ $question->user->url }}">  {{ $question->user->name}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{$question->answers_count.' '.Str::plural('Answer',$question->answers_count)}} </h3>
                </div>
                <div class="card-body">
                    @foreach ($question->answers as $answer)
                       <div class="media mt-2">
                            <div class="media-left mr-4">
                                <div class="d-flex flex-column votes-controls">

                                    <a title="Vote up" href="#" class="votes-up">
                                        <i class="fas fa-caret-up fa-3x"></i>
                                    </a>
                                    <span class="votes-count">123</span>
                                    <a title="Vote down" href="#" class="votes-down p-0 m-0">
                                        <i class="fas fa-caret-down fa-3x p-0 m-0"></i>
                                    </a>
                                    <a title="Accept answer" href="#" class="favorite d-flex flex-column">
                                            <i class="fas fa-check fa-2x mb-2"></i>
                                            <span class="favorites-count text-muted">123</span>
                                    </a>

                                </div>
                            </div>
                            <div class="media-body">
                                    {!! nl2br(e($answer->body),false) !!}
                            </div>
                        </div>

                        <div>
                            <div class="d-flex justify-content-end">
                                <div class="mt-2 d-flex flex-column">
                                    <span class="text-muted"> Answered {{ $answer->created_date }}</span>
                                    <div class="media mt-2">
                                        <div class="media-left mr-2">
                                            <img src="{{ $answer->user->profile->avatar }}" class="media-object rounded-circle" width='40' height="40">
                                        </div>
                                        <div class="media-body mt-2">
                                                 <a href="{{ $answer->user->url }}">  {{ $answer->user->name}}</a>
                                        </div>
                                     </div>

                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
