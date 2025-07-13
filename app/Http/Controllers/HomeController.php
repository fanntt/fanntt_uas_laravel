<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IrfanBarang;

class HomeController extends Controller
{
    public function index()
    {
        $barangs = IrfanBarang::with(['kategori', 'ruangan'])->paginate(12);
        return view('homepage', compact('barangs'));
    }
}
