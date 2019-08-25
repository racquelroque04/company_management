@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Create your Company</div>

          <div class="card-body">
            <form action="" class="form-group">
              <label for="" class="col-md-4 col-form-label">Company Name</label>
              <input type="text" name="company_name" class="form-control">
            </form>
            <form action="" class="form-group">
              <label for="" class="col-md-4 col-form-label">First Name</label>
              <input type="text" name="first_name" class="form-control">
            </form>
            <form action="" class="form-group">
              <label for="" class="col-md-4 col-form-label">Last Name</label>
              <input type="text" name="last_name" class="form-control">
            </form>
            <form action="" class="form-group">
              <label for="" class="col-md-4 col-form-label">Email</label>
              <input type="text" name="email" class="form-control">
            </form>
            <form action="" class="form-group">
              <label for="" class="col-md-4 col-form-label">Password</label>
              <input type="text" name="password" class="form-control">
            </form>
            <form action="" class="form-group">
              <label for="" class="col-md-4 col-form-label">Confirm Password</label>
              <input type="text" name="confirm_password" class="form-control">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
