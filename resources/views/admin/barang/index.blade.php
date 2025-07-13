@extends('layouts.app')
@section('content')
<div class="max-w-6xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Barang</h1>
        <a href="{{ route('barang.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Tambah Barang</a>
    </div>
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama Barang</th>
                    <th class="px-4 py-2 border">Kategori</th>
                    <th class="px-4 py-2 border">Ruangan</th>
                    <th class="px-4 py-2 border">Stok</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barangs as $barang)
                <tr>
                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $barang->nama_barang }}</td>
                    <td class="px-4 py-2 border">{{ $barang->kategori->nama_kategori ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $barang->ruangan->nama_ruangan ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $barang->stok }}</td>
                    <td class="px-4 py-2 border space-x-2">
                        <a href="{{ route('barang.show', $barang->id) }}" class="text-blue-600 hover:underline">Detail</a>
                        <a href="{{ route('barang.edit', $barang->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus barang?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4">Belum ada data barang.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $barangs->links() }}</div>
</div>
@endsection
