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
                            <div class="d-flex flex-column votes-controls text-center">

                                @include('shared._vote',[
                                    'model'=>$question
                                ])

                            </div>
                        </div>
                        <div class="media-body">
                                {!! nl2br(e($question->body),false) !!}
                        </div>
                    </div>

                   @include('shared._author',['model'=>$question])
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
