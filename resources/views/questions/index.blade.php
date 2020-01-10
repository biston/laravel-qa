@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All questions</div>

                <div class="card-body">
                  @foreach ($questions as $question)
                     <div class="media">
                         <div class="media-body">
                            <h3><a href="{{ $question->url }}">{{$question->title}}</a></h3>
                             <p class="lead">
                                 <span>Ask by </span><a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                 <small class="text-muted">{{ $question->created_date}}</small>
                             </p>
                                {{ Str::limit($question->body,100) }}
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