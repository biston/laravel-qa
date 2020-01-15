@can('accept', $answer)
<a title="Mark this answer as best answer" onClick="event.preventDefault();document.getElementById('accept-answer-{{$answer->id}}').submit()" class="{{ $answer->status }} d-flex flex-column">
        <i class="fas fa-check fa-2x mb-2"></i>
</a>
@else
    @if ($answer->is_best_answer)
     <a title="Marked as best answer"  class="{{ $answer->status }} d-flex flex-column">
        <i class="fas fa-check fa-2x mb-2"></i>
     </a>
   @endif

@endcan


<form id="accept-answer-{{ $answer->id }}" action="{{ route('questions.accept-answer', ['answer'=>$answer]) }}" method="post" style="display: none">
  @csrf
</form>

