@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Add Positions to your Company</div>

          <div class="card-body">
            <form method="POST" action="{{ route('position.store') }}">
              @csrf
              <div class="form-group">
                <label for="" class="col-md-4 col-form-label">Position 1</label>
                <input type="text" name="position[]" class="form-control">
              </div>
              <div class="form-group">
                <label for="" class="col-md-4 col-form-label">Position 2</label>
                <input type="text" name="position[]" class="form-control">
              </div>
              <div class="form-group">
                <label for="" class="col-md-4 col-form-label">Position 3</label>
                <input type="text" name="position[]" class="form-control">
              </div>
              <div class="form-group">
                <label for="" class="col-md-4 col-form-label">Position 4</label>
                <input type="text" name="position[]" class="form-control">
              </div>
              <div class="form-group">
                <label for="" class="col-md-4 col-form-label">Position 5</label>
                <input type="text" name="position[]" class="form-control">
                 </div>
              <div class="form-group">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
