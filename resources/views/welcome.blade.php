@extends('layout')
@section('content')
<div class="flex w-screen h-screen justify-center items-center">
      <form action="">
        <div class="w-full max-w-[400px] p-10 flex flex-col items-center">
            @csrf
            <input type="text" name="user" class="rounded-md mb-4 border px-2 py-1 text-sm" placeholder = "username"/>
            <input type="password" name="user" class="rounded-md mb-4 border px-2 py-1 text-sm" placeholder = "username"/>
            <button class="px-2 py-1 text-center rounded-md text-white border bg-blue-500 text-sm w-max">sing in</button>
        </div>
    </form>
  </div>
@endsection