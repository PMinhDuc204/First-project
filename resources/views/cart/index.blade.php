@extends('layouts.main')

@section('content')
<div class="container">

    <header>
        <a href="{{ route('sanpham.index') }}" class="history" style="background-color: #9b59b6;">Quay lai</a>
    </header>
    <h2>Giỏ Hàng</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    @if(count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $sanpham)
                    <tr>
                        <td>{{ $sanpham['name'] }}</td>
                        <td>{{ number_format($sanpham['price'], 0, ',', '.') }} VNĐ</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $sanpham['quantity'] }}" min="1">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </td>
                        <td>{{ number_format($sanpham['price'] * $sanpham['quantity'], 0, ',', '.') }} VNĐ</td>
                        <td>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4>Tổng cộng: {{ number_format(array_sum(array_map(function($product) {
            return $product['price'] * $product['quantity'];
        }, $cart)), 0, ',', '.') }} VNĐ</h4>

        <a href="{{ route('cart.checkout') }}" class="btn btn-success">Tiến hành thanh toán</a>
        <div style="text-align: center; margin: 30px 0;">
            <p><strong>Quét mã QR để thanh toán:</strong></p>
            <img src="{{ asset('images/iconn.png') }}" alt="QR thanh toán" width="280" style="border: 1px solid #ccc; border-radius: 10px;">
            <p style="margin-top: 10px;">Ngân hàng: MB Bank<br>Tên người nhận: Phu Minh Duc</p>
        </div>
    @else
        <p>Giỏ hàng của bạn trống.</p>
    @endif
</div>
@endsection
