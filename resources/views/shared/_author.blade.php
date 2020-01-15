<div class="mt-2 d-flex flex-column">
    <span class="text-muted"> Asked {{ $model->created_date }}</span>

    <div class="media mt-2">
        <div class="media-left mr-2">
            <img src="{{ $model->user->profile->avatar }}" class="media-object rounded-circle" width='40' height="40">
        </div>
        <div class="media-body mt-2">
                <a class="author" href="{{ $model->user->url }}">  {{ $model->user->name}}</a>
        </div>
    </div>
</div>
