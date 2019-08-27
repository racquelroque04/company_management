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
            <clocked-out class="text-center"></clocked-out>
            <div class="row text-center">
              <div class="h5 p-3">
                Time Rendered for Today
              </div>
            </div>
            <div class="row text-center">
              <div class="h5 p-3">
                --:--
              </div>
            </div>
            <div class="row text-center">
              <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">Clock In</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card">
          <div class="card-body p-lg-5">
              <div class="row">
                <div class="col-8">
                  <div class="text-lg-left">
                    <div class="h4">
                      {{ auth()->user()->name }}
                    </div>
                    <div class="h6">
                      {{ auth()->user()->name }}
                    </div>
                    <div class="h6">
                      {{ auth()->user()->employee->position->name }}
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  profile
                </div>
              </div>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-header h-50">
            <div class="h5 text-left">
              Attendance
            </div>
          </div>
          <div class="card-body p-lg-4">
            <div class="row">
              <div class="col-8">
                <div class="text-lg-left">
                  <div class="h4">
                    {{ auth()->user()->name }}
                  </div>
                  <div class="h6">
                    {{ auth()->user()->name }}
                  </div>
                  <div class="h6">
                    {{ auth()->user()->employee->position->name }}
                  </div>
                </div>
              </div>
              <div class="col-4">
                profile
              </div>
            </div>
          </div>
        </div>
      </div>
      <in-out></in-out>
    </div>
  </div>
@endsection
