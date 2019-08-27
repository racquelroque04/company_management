@extends('layouts.app')

@section('content')
  <div class="container">
    <input type="hidden" id="company_id" value="{{ auth()->user()->company->id }}">
    <dashboard></dashboard>
  </div>
@endsection
