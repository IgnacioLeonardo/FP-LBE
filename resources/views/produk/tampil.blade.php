@extends('layout')

@section('konten')

<div class="d-flex mb-3">
    <h4>List Produk</h4>
    <div class="ms-auto">
        <a class="btn btn-success" href="{{ route('produk.create') }}">Create Produk</a>
    </div>
</div>

<!-- Add a container for the table -->
<div class="table-container">
    <table class="table">
        <tr>
            <th>No</th>
            <th>id</th>
            <th>nama</th>
            <th>harga</th>
            <th>jumlah stock</th>
            <th>action</th>
        </tr>
        @foreach($produk as $no=>$data)
        <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $data->id}}</td>
            <td>{{ $data->nama}}</td>
            <td>{{ $data->harga}}</td>
            <td>{{ $data->jumlah_stock}}</td>
            <td>
                <a href="{{ route('produk.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('produk.delete', $data->id) }}" method="post" style="display:inline-block;">
                    @csrf
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
                <form action="{{ route('produk.addtocart', $data->id) }}" method="post" style="display:inline-block;">
                    @csrf
                    <button class="btn btn-sm btn-primary">Add to Cart</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

<!-- Sticky Checkout Bar -->
@if(session('cart'))
    @php
        // Inisialisasi $totalItems
        $totalItems = 0;

        // Hitung total quantity dari semua produk dalam keranjang
        foreach (session('cart') as $item) {
            $totalItems += $item['quantity'];
        }
    @endphp
    <div class="checkout-bar">
        <div class="cart-info">
            <span>{{ $totalItems }}</span> Produk dalam Keranjang
        </div>
        <div>
            <a href="{{ route('produk.checkout') }}" class="btn btn-checkout">Checkout</a>
        </div>
    </div>
@endif


@endsection
