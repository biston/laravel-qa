<div class="media item">
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
          <div>
              @can('update', $question)
                  <a href="{{ route('questions.edit', $question) }}" class="btn btn-outline-info mr-2"><i class="far fa-edit"></i></a>
              @endcan
              @can('delete', $question)

                  <form class="form-delete" action="{{ route('questions.destroy', $question) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                 </form>
              @endcan
          </div>
       </div>

       <p class="lead">
           <span>Ask by </span><a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
           <small class="text-muted">{{ $question->created_date}}</small>
       </p>
          {{ Str::limit($question->body,300) }}
   </div>
</div>
