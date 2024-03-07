@extends('layout')
@section('content')
<div class="flex w-screen h-screen">
  <div class="min-w-screen w-full min-h-screen h-full">
    @yield('sub-content')
  </div>
</div>
@endsection