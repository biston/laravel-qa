
  <div class="form-group">

     <label for="title" class="col-form-label">Question title</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title',$question->title)}}">

     @error('title')
      <span class="invalid-feedback" role="alert">
          <strong> {{ $message }}</strong>
      </span>
     @enderror
  </div>

  <div class="form-group">
    <label for="body" class="col-form-label">Question body</label>
    <textarea name="body" id="body"  rows="10" class="form-control @error('body') is-invalid @enderror">{{ old('body',$question->body) }}</textarea>

    @error('body')
      <span class="invalid-feedback">
          <strong>{{ $message }}</strong>
      </span>
    @enderror

  </div>

  <div class="form-group">
     <input type="submit" value="{{ $action }}" class="btn btn-outline-primary">
  </div>
