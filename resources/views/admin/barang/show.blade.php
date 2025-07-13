@extends('layouts.app')
@section('content')
<div class="max-w-lg mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Detail Barang</h1>
    <div class="bg-white rounded shadow p-6 space-y-4">
        <div><span class="font-semibold">Nama Barang:</span> {{ $barang->nama_barang }}</div>
        <div><span class="font-semibold">Deskripsi:</span> {{ $barang->deskripsi }}</div>
        <div><span class="font-semibold">Stok:</span> {{ $barang->stok }}</div>
        <div><span class="font-semibold">Kategori:</span> {{ $barang->kategori->nama_kategori ?? '-' }}</div>
        <div><span class="font-semibold">Ruangan:</span> {{ $barang->ruangan->nama_ruangan ?? '-' }}</div>
    </div>
    <div class="mt-6">
        <a href="{{ route('barang.index') }}" class="px-4 py-2 bg-gray-300 rounded">Kembali</a>
    </div>
</div>
@endsection
