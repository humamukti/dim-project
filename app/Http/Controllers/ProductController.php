<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Menampilkan daftar produk
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::get();
        return view('products.index',compact('products'));
    }

    /**
     * Menampilkan form untuk membuat produk baru
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Menyimpan produk baru ke database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        request()->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'biaya_penyimpanan' => 'required',
            'periode_permintaan' => 'required',
            'satuan' => 'required',
            'konversi' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Menampilkan produk tertentu
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Form edit produk
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Menyimpan produk yang diedit ke database
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        request()->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'biaya_penyimpanan' => 'required',
            'periode_permintaan' => 'required',
            'satuan' => 'required',
            'konversi' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Menghapus produk tertentu
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

//        $product->delete();

        return redirect()->route('products.index')
            ->with('success','Product deleted successfully');
    }
}
