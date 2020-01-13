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
                                @can('accept', $answer)
                                <a title="Mark this answer as best answer" onClick="event.preventDefault();document.getElementById('accept-form-{{$answer->id}}').submit()" class="{{ $answer->status }} d-flex flex-column">
                                        <i class="fas fa-check fa-2x mb-2"></i>
                                </a>
                                @else
                                    @if ($answer->is_best_answer)
                                    <a title="Marked as best answer"  class="{{ $answer->status }} d-flex flex-column">
                                            <i class="fas fa-check fa-2x mb-2"></i>
                                     </a>
                                    @endif

                                @endcan


                            <form id="accept-form-{{ $answer->id }}" action="{{ route('questions.accept-answer', ['answer'=>$answer]) }}" method="post" style="display: none">
                                @csrf
                                </form>
                            </div>
                        </div>
                        <div class="media-body">
                                {!! nl2br(e($answer->body),false) !!}
                        </div>
                    </div>

                    <div>
                        <div class="d-flex justify-content-between">
                          <div class="mt-4 bt-ml">
                                @can('update', $answer)
                                    <a href="{{ route('questions.answers.edit', ['question'=>$question,'answer'=>$answer]) }}" class="btn btn-outline-info mr-2"><i class="far fa-edit"></i></a>
                                @endcan
                                @can('delete', $answer)

                                    <form class="form-delete" action="{{ route('questions.answers.destroy', ['question'=>$question,'answer'=>$answer]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                @endcan
                            </div>

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
