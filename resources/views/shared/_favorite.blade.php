
<a title="Mark as favorite" onClick="event.preventDefault();document.getElementById('favorite-form-{{ $question->id }}').submit()" class="favorite text-center {{ Auth::guest()?'off':($question->is_favorited ?'favorited':'')  }} d-flex flex-column">
        <i class="fas fa-star fa-2x mb-2 "></i>
        <span class="favorites-count text-muted">{{ $question->favorites_count }}</span>
</a>
<form id="favorite-form-{{ $question->id }}" action="{{ route('questions.favorite',$question) }}" method="post" style="display: none">
        @csrf
        @if ($question->is_favorited)
            @method('delete')
        @endif
</form>
