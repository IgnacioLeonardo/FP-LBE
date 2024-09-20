@extends('layout')

@section('konten')

<h4>Checkout</h4>

@if(count($cart) > 0)
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        @php $totalHarga = 0; @endphp
        @foreach($cart as $id => $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item['nama'] }}</td>
            <td>{{ number_format($item['harga'], 0, ',', '.') }}</td>
            <td>{{ $item['quantity'] }}</td>
            <td>{{ number_format($item['harga'] * $item['quantity'], 0, ',', '.') }}</td>
            <td>
                <!-- Tambahkan tombol untuk mengurangi dan menambah item -->
                <form action="{{ route('produk.removeFromCart', $id) }}" method="post" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-warning">-</button>
                </form>

                <form action="{{ route('produk.addtocart', $id) }}" method="post" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-success">+</button>
                </form>

                <!-- Tombol untuk menghapus item dari keranjang -->
                <form action="{{ route('produk.deleteFromCart', $id) }}" method="post" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @php $totalHarga += $item['harga'] * $item['quantity']; @endphp
        @endforeach
        <tr>
            <td colspan="4" class="text-end"><strong>Total Harga:</strong></td>
            <td><strong>{{ number_format($totalHarga, 0, ',', '.') }}</strong></td>
        </tr>
    </table>

    <div class="text-end mt-3">
        <a href="#" class="btn btn-primary">Lanjutkan Pembayaran</a>
    </div>
@else
    <p>Tidak ada produk di keranjang.</p>
@endif

@endsection
