@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body p-lg-4">
            <clock></clock>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-body p-lg-4">
            <div class="text-center">
              <div class="h3">
                {{ auth()->user()->employee->company->name }}
              </div>
              <i class="fa fa-building" style="font-size: 24px; padding-top: 10px;"></i>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-header h-50">
            <div class="h5 text-center">
              Time Card
            </div>
          </div>
          <div class="card-body p-lg-4">
            <clocked-status class="text-center"></clocked-status>
            <div class="text-center">
              <div class="h5 p-3 font-weight-bold">
                Time Rendered for Today
              </div>
            </div>
            <duration-timer></duration-timer>
            <div class="text-center">
              <bundy-button></bundy-button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body p-lg-5">
              <div class="row">
                <div class="col-2 text-right">
                  <img class="w-100" src="https://png.pngtree.com/svg/20170602/b7c3ca6e9e.png" alt="">
                </div>
                <div class="col-10">
                  <div class="text-lg-left">
                    <input type="hidden" id="user_id" value="{{ auth()->user()->id }}">
                    <div class="h4">
                      {{ auth()->user()->name }}
                    </div>
                    <div class="h6">
                      {{ auth()->user()->email }}
                    </div>
                    <div class="h6">
                      {{ auth()->user()->employee->position->name }}
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-header h-50">
            <div class="h5 text-left font-weight-bold">
              My Attendances for this week
            </div>
          </div>
          <div class="card-body p-lg-4">
            <attendances></attendances>
          </div>
        </div>
      </div>
      <in-out></in-out>
    </div>
  </div>
@endsection
