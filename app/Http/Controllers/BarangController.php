<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IrfanBarang;
use App\Models\IrfanKategori;
use App\Models\IrfanRuangan;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = IrfanBarang::with(['kategori', 'ruangan'])->paginate(10);
        return view('admin.barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = IrfanKategori::all();
        $ruangans = IrfanRuangan::all();
        return view('admin.barang.create', compact('kategoris', 'ruangans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'stok' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:Irfan_kategori,id',
            'ruangan_id' => 'required|exists:Irfan_ruangan,id',
        ]);
        IrfanBarang::create($validated);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $barang = IrfanBarang::with(['kategori', 'ruangan'])->findOrFail($id);
        return view('admin.barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = IrfanBarang::findOrFail($id);
        $kategoris = IrfanKategori::all();
        $ruangans = IrfanRuangan::all();
        return view('admin.barang.edit', compact('barang', 'kategoris', 'ruangans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'stok' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:Irfan_kategori,id',
            'ruangan_id' => 'required|exists:Irfan_ruangan,id',
        ]);
        $barang = IrfanBarang::findOrFail($id);
        $barang->update($validated);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = IrfanBarang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
