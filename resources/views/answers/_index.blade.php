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
                                <a title="Mark this answer as best answer" href="#" class="vote-accepted d-flex flex-column">
                                    <i class="fas fa-check fa-2x mb-2"></i>
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
                                    <div class="media-body mt-2 ">
                                             <a href="{{ $answer->user->url }}" class="author">  {{ $answer->user->name}}</a>
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
