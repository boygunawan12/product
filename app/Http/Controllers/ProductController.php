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

    public function edit($id)
    {
        $data = Product::where('id_produk', $id)
        ->first();
        
        return view('admin.product.form')->with([
            'data' => $data
        ]);

    }

    public function update(Request $request, $id)
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
        );

        Product::where('id_produk', $id)->update($data);

        return redirect('/product')->with('status', 'Produk Anda Sudah Diedit'); 
    }

    public function destroy($id)
    {
        Product::where('id_produk', $id)->delete();

        return redirect()->back()->with('status', 'Produk Anda Sudah Dihapus'); 
    }

    public function getJson()
    {
        $baseUrl = env('URL_API');

        $date  = date("d");
        $month = date("m");
        $gety  = date("Y");
        $hour  = date('H');
        $year  = substr($gety, -2);

        $user = "tesprogrammer".$date.$month.$year."C".$hour;
        $pass = md5("bisacoding-".$date."-".$month."-".$year);

        $client = new Client([
                'base_uri' => $baseUrl
            ]);
        $response = $client->post('tes/api_tes_programmer', [
            'form_params' => [
                'username' => $user,
                'password' => $pass
            ],
        ]);
        $get = json_decode($response->getBody()->getContents());

        foreach ($get->data as $result)
        {
            $data = array(
                'id_produk' => $result->id_produk,
                'nama_produk' => $result->nama_produk,
                'harga' => $result->harga,
                'kategori' => $result->kategori,
                'status' => $result->status
            );

            try {
                Product::insert($data); 
            } catch (\Illuminate\Database\QueryException $e){
                $errorCode = $e->errorInfo[1];
                if ($errorCode == '1062'){
                    return redirect('/product')->with('status', 'ID Produk Sudah Dipakai'); 
                }
            }      
        } 
    }
}
