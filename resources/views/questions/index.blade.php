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
                      @include('questions._question')
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
