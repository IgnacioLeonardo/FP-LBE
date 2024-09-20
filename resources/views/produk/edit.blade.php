@extends('layout')

@section('konten')

<h4>Edit Produk</h4>

<form action="{{ route('produk.update', $produk->id) }}" method="post">
    @csrf
    <label>ID</label>
    <input type="number" name="id" value="{{ $produk->id }}" class="form-control mb-2">
    <label>Nama</label>
    <input type="text" name="nama" value="{{ $produk->nama }}" class="form-control mb-2">
    <label>Harga</label>
    <input type="number" name="harga" value="{{ $produk->harga }}" class="form-control mb-2">
    <label>Jumlah Stock</label>
    <input type="number" name="jumlah_stock" value="{{ $produk->jumlah_stock }}" class="form-control mb-2">

    <button class="btn btn-primary">Edit</button>
</form>


@endsection