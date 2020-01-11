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
                   {!! nl2br(e($question->body),false) !!}
                   <div>
                        <div class="mt-2 d-flex flex-column">
                            <span class="text-muted"> Asked {{ $question->created_date }}</span>
                            <a href="{{ $question->user->url}} ">By  {{ $question->user->name  }}</a>
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
                        <div>
                            {!! nl2br(e($answer->body),false) !!}
                            <div class="d-flex justify-content-end">
                                <div class="mt-2 d-flex flex-column">
                                    <span class="text-muted"> Answered {{ $answer->created_date }}</span>
                                    <a href="{{ $answer->user->url }}">By {{ $answer->user->name}}</a>
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
