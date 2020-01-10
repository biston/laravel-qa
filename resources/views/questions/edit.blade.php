@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Update the question</h3>
                    <a class="btn btn-outline-secondary" href="{{ route('questions.index')}}">Back to all questions</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('questions.update',$question) }}" method="post">
                        @csrf
                        @method('put')
                        @include('questions._form',['action'=>'Update question'])
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
