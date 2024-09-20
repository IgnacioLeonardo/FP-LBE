<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    function tampil(){
        $produk = Produk::get();
        return view('produk.tampil', compact('produk'));
    }

    function create(){
        return view('produk.create');
    }

    function submit(Request $request){
        $produk = new Produk();
        $produk->id = $request->id;
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->jumlah_stock = $request->jumlah_stock;
        $produk->save();

        return redirect()->route('produk.tampil');
    }

    function edit($id){
        $produk = Produk::find($id);
        return view('produk.edit', compact('produk'));
    }

    function update(Request $request, $id){
        $produk = Produk::find($id);
        $produk->id = $request->id;
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->jumlah_stock = $request->jumlah_stock;
        $produk->update();

        return redirect()->route('produk.tampil');
    }

    function delete($id) {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect()->route('produk.tampil');
    }

    public function addToCart($id)
    {
        $produk = Produk::find($id);
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            // Jika produk sudah ada, tambahkan kuantitas
            $cart[$id]['quantity']++;
        } else {
            // Jika produk belum ada, tambahkan produk dengan kuantitas 1
            $cart[$id] = [
                "nama" => $produk->nama,
                "harga" => $produk->harga,
                "quantity" => 1
            ];
        }
    
        session()->put('cart', $cart);
        
        // Jangan redirect ke cart, tetap di halaman yang sama
        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
    

    


public function checkout()
{
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect()->route('produk.tampil')->with('error', 'Keranjang masih kosong. Tambahkan produk sebelum checkout.');
    }

    return view('produk.checkout', compact('cart'));
}


public function viewCart()
{
    $cart = session()->get('cart', []);
    return view('produk.cart', compact('cart'));
}

public function removeFromCart($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        if ($cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
        } else {
            unset($cart[$id]); // Jika kuantitas 0, hapus produk dari keranjang
        }
        session()->put('cart', $cart);
    }

    return redirect()->route('produk.checkout')->with('success', 'Produk diperbarui di keranjang!');
}

public function deleteFromCart($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        unset($cart[$id]); // Hapus produk dari keranjang
        session()->put('cart', $cart);
    }

    return redirect()->route('produk.checkout')->with('success', 'Produk dihapus dari keranjang!');
}


}
