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
}
