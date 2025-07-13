@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>
    <div class="bg-white rounded shadow p-6 mb-6">
        <p class="text-lg">Selamat datang, <span class="font-semibold">{{ Auth::user()->name }}</span>!</p>
        <p class="text-gray-600 mt-2">Anda login sebagai <span class="font-semibold">Admin</span>.</p>
    </div>
    <div class="flex flex-col sm:flex-row gap-4">
        <a href="{{ route('barang.index') }}" class="flex-1 px-6 py-4 bg-blue-600 text-white rounded text-center font-semibold hover:bg-blue-700 transition">Kelola Barang</a>
        <a href="{{ route('homepage') }}" class="flex-1 px-6 py-4 bg-gray-200 text-gray-800 rounded text-center font-semibold hover:bg-gray-300 transition">Lihat Homepage User</a>
    </div>
</div>
@endsection
