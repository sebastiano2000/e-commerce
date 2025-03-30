@extends('components.layouts.app')

@section('content')
<div class="w-1/3 mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold">Login</h2>
    <input type="email" placeholder="Email" class="border p-2 w-full mb-2">
    <input type="password" placeholder="Password" class="border p-2 w-full mb-2">
    <button class="bg-blue-500 text-white px-6 py-2 rounded w-full">Login</button>
</div>
@endsection
