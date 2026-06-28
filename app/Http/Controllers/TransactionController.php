<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // tampilan form transaksi pada index
    public function index()
{
    // Kita ambil semua produk tanpa filter 'stok' dulu untuk melewati error database
    $products = \App\Models\product::all();
    
    return view('transactions.index', compact('products'));
}
}