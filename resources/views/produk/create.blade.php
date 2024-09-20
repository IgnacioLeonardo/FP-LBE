@extends('layout')

@section('konten')

<h4>Create Produk</h4>

<form action="{{ route('produk.submit') }}" method="post">
    @csrf
    <label>ID</label>
    <input type="number" name="id" class="form-control mb-2">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control mb-2">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control mb-2">
    <label>Jumlah Stock</label>
    <input type="number" name="jumlah_stock" class="form-control mb-2">

    <button class="btn btn-primary">Create</button>
</form>


@endsection