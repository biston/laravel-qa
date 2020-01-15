@if ($model instanceof App\Question)
    @php
        $name='question';
        $firstUrl='questions';
        $id=$model->slug;
    @endphp
@else
    @php
        $name='answer';
        $firstUrl='answers';
        $id=$model->id;
    @endphp
@endif


<a title="Vote up" onClick="event.preventDefault();document.getElementById('vote-up-{{ $name }}-{{ $model->id }}').submit()" class="votes-up {{ (Auth::guest() || $model->voted_up)? 'off':'' }}">
  <i class="fas fa-caret-up fa-3x"></i>
</a>

<form id="vote-up-{{ $name }}-{{ $model->id }}" action="/{{ $firstUrl }}/{{ $id }}/vote" method="post" style="display: none">
  @csrf
  <input type="hidden" name="vote" id="vote" value="1">
</form>

<span class="votes-count">{{ $model->votes_count }}</span>
<a title="Vote down" onClick="event.preventDefault();document.getElementById('vote-down-{{ $name }}-{{ $model->id }}').submit()" class="votes-down {{ (Auth::guest() || $model->voted_down)? 'off':'' }}">
  <i class="fas fa-caret-down fa-3x"></i>
</a>

<form id="vote-down-{{ $name }}-{{ $model->id }}" action="/{{ $firstUrl }}/{{ $id }}/vote" method="post" style="display: none">
  @csrf
  <input type="hidden" name="vote" id="vote" value="-1">
</form>

@if ($model instanceof App\Question)

      @include('shared._favorite')

@else

      @include('shared._accept')

@endif
