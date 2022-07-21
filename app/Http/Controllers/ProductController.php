<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::where('status', 'bisa dijual')
            ->get();

        return view('admin.product.index')->with([
            'data' => $data
        ]);
 
    }

    public function create()
    {

        return view('admin.product.form');

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_produk' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
        ],
        [
            'nama_produk.required' => 'Nama Produk harus diisi!!',
            'kategori.required' => 'Kategori harus diisi!!',
            'harga.required' => 'Harga harus diisi!!',
        ]);

        $data = array(
             'nama_produk' => $request->nama_produk,
             'kategori' => $request->kategori,
             'harga' => $request->harga,
             'status' => 'bisa dijual',
        );

        Product::insert($data);

        return redirect('/product')->with('status', 'Produk Anda Sudah Ditambahkan'); 
    }
}
