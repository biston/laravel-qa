@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>All questions</h3>
                    <a class="btn btn-outline-secondary" href="{{ route('questions.create')}}">Ask a question</a>
                </div>

                <div class="card-body">


                  @include('layouts._message')

                  @foreach ($questions as $question)
                     <div class="media">
                        <div class="d-flex flex-column counters">
                            <div class="vote d-flex flex-column justify-content-center mb-3">
                                <strong>{{ $question->votes_count }} </strong><span>{{ Str::plural('vote',$question->votes_count) }}</span>
                            </div>
                            <div class="answer status {{ $question->status }} d-flex flex-column justify-content-center mb-3">
                                <strong>{{ $question->answers_count }} </strong><span>{{ Str::plural('answer',$question->answers_count) }}</span>
                            </div>
                            <div class="view">
                                {{ $question->views_count .' '.Str::plural('view',$question->views_count) }}
                            </div>
                        </div>
                         <div class="media-body ml-4">
                             <div class="d-flex justify-content-between">
                                <h4><a href="{{ $question->url }}">{{$question->title}}</a></h4>
                                 <a href="{{ route('questions.edit', $question) }}" class="btn btn-outline-info">Edit</a>
                             </div>

                             <p class="lead">
                                 <span>Ask by </span><a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                 <small class="text-muted">{{ $question->created_date}}</small>
                             </p>
                                {{ Str::limit($question->body,300) }}
                         </div>
                     </div>
                     <hr>
                  @endforeach
                </div>
                <div class="d-flex justify-content-center">
                  {{ $questions->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
