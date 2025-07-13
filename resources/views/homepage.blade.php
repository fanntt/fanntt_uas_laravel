@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Daftar Barang yang Dapat Dipinjam</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($barangs as $barang)
        <div class="bg-white rounded shadow p-4 flex flex-col justify-between">
            <div>
                <h2 class="text-lg font-semibold mb-2">{{ $barang->nama_barang }}</h2>
                <div class="text-sm text-gray-600 mb-1">Kategori: {{ $barang->kategori->nama_kategori ?? '-' }}</div>
                <div class="text-sm text-gray-600 mb-1">Ruangan: {{ $barang->ruangan->nama_ruangan ?? '-' }}</div>
                <div class="text-sm text-gray-600 mb-1">Stok: {{ $barang->stok }}</div>
                <div class="text-gray-700 mt-2">{{ Str::limit($barang->deskripsi, 60) }}</div>
            </div>
            <!-- Tombol pinjam akan ditambahkan pada fitur peminjaman -->
        </div>
        @empty
        <div class="col-span-4 text-center text-gray-500 py-8">Belum ada barang yang tersedia.</div>
        @endforelse
    </div>
    <div class="mt-6">{{ $barangs->links() }}</div>
</div>
@endsection
