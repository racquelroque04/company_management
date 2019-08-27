@extends('layouts.app')

@section('content')
  <div class="container">
    @if($role->slug == 'admin')
      <dashboard></dashboard>
    @endif
  </div>
@endsection
