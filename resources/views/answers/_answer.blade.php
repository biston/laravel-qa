<div class="item">
    <div class="media mt-2">
        <div class="media-left mr-4">
            <div class="d-flex flex-column votes-controls text-center">

                @include('shared._vote',[
                    'model'=>$answer
                ])

            </div>
        </div>
        <div class="media-body">
                {!! nl2br(e($answer->body),false) !!}
        </div>
    </div>

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

            @include('shared._author',['model'=>$answer])
    </div>

</div>
