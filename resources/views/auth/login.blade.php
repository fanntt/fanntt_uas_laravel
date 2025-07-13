@extends('layouts.app')
@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold text-center">Login</h2>
        @if($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                {{ $errors->first() }}
            </div>
        @endif
        <form method="POST" action="{{ url('/login') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" type="email" name="email" required autofocus class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium">Password</label>
                <input id="password" type="password" name="password" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <button type="submit" class="w-full py-2 font-semibold text-white bg-blue-600 rounded hover:bg-blue-700">Login</button>
        </form>
        <div class="text-center text-sm mt-4">
            Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
        </div>
    </div>
</div>
@endsection
