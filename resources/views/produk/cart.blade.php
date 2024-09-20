@extends('layout')

@section('konten')

<h4>Keranjang Belanja</h4>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(count($cart) > 0)
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
        @php $totalHarga = 0; @endphp
        @foreach($cart as $id => $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item['nama'] }}</td>
            <td>{{ number_format($item['harga'], 0, ',', '.') }}</td>
            <td>{{ $item['quantity'] }}</td>
            <td>{{ number_format($item['harga'] * $item['quantity'], 0, ',', '.') }}</td>
        </tr>
        @php $totalHarga += $item['harga'] * $item['quantity']; @endphp
        @endforeach
        <tr>
            <td colspan="4" class="text-end"><strong>Total Harga:</strong></td>
            <td><strong>{{ number_format($totalHarga, 0, ',', '.') }}</strong></td>
        </tr>
    </table>

    <div class="text-end mt-3">
    <a href="{{ route('produk.checkout') }}" class="btn btn-success">Checkout</a>
</div>

@else
    <p>Keranjang kosong. <a href="{{ route('produk.tampil') }}">Tambahkan produk</a> ke keranjang.</p>
@endif

@endsection
