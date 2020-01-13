@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Edit answer for question: <b>{{ $question->title}}</b></h5>
                    <a class="btn btn-outline-secondary" href="{{ route('questions.show',$question)}}">Back to Question</a>
                </div>
                    <div class="card-body">
                        <form action="{{ route('questions.answers.update',['question'=>$question,'answer'=>$answer]) }}" method="post">
                            @csrf
                            @method('put')

                              <div class="form-group">
                                <label for="body" class="col-form-label">Answer body</label>
                                <textarea name="body" id="body"  rows="10" class="form-control @error('body') is-invalid @enderror">{{ old('body',$answer->body) }}</textarea>

                                @error('body')
                                  <span class="invalid-feedback">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror

                              </div>

                              <div class="form-group d-flex justify-content-center">
                                <input type="submit" value="Submit" class="btn btn-outline-primary">
                              </div>

                        </form>
                    </div>


            </div>
        </div>
    </div>
</div>
@endsection
