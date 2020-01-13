
<div class="card">

  <div class="card-body">
      <div class="card-title">
          <h3>Your answer</h3>
      </div>
      <hr>
      <form action="{{ route('questions.answers.store',$question) }}" method="post">
          @csrf
            <div class="form-group">
              <label for="body" class="col-form-label">Answer body</label>
              <textarea name="body" id="body"  rows="10" class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>

              @error('body')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror

            </div>

            <div class="form-group d-flex justify-content-center">
              <input type="submit" value="Submit" class="btn btn-outline-primary">
            </div>

      </form>
  </div>

</div>
