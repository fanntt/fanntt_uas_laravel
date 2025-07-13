@extends('layouts.app')
@section('content')
<div class="max-w-lg mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Barang</h1>
    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">{{ $errors->first() }}</div>
    @endif
    <form action="{{ route('barang.update', $barang->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-1">Nama Barang</label>
            <input type="text" name="nama_barang" class="w-full border rounded px-3 py-2" required value="{{ old('nama_barang', $barang->nama_barang) }}">
        </div>
        <div>
            <label class="block mb-1">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded px-3 py-2" required>{{ old('deskripsi', $barang->deskripsi) }}</textarea>
        </div>
        <div>
            <label class="block mb-1">Stok</label>
            <input type="number" name="stok" class="w-full border rounded px-3 py-2" required min="0" value="{{ old('stok', $barang->stok) }}">
        </div>
        <div>
            <label class="block mb-1">Kategori</label>
            <select name="kategori_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id', $barang->kategori_id) == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block mb-1">Ruangan</label>
            <select name="ruangan_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Ruangan --</option>
                @foreach($ruangans as $ruangan)
                    <option value="{{ $ruangan->id }}" {{ old('ruangan_id', $barang->ruangan_id) == $ruangan->id ? 'selected' : '' }}>{{ $ruangan->nama_ruangan }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-between">
            <a href="{{ route('barang.index') }}" class="px-4 py-2 bg-gray-300 rounded">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection
