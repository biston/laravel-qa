<div class="row justify-content-center mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>{{$answers_count.' '.Str::plural('Answer',$answers_count)}} </h3>
                </div>
                <hr>
                @include('layouts._message')
                @foreach ($answers as $answer)
                   @include('answers._answer')
                @endforeach
            </div>
        </div>
    </div>
</div>
