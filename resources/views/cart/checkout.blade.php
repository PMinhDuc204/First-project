@extends('layouts.main')

@section('content')
    <h2>Thông tin thanh toán</h2>

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <label>Họ tên:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Địa chỉ giao hàng:</label><br>
        <input type="text" name="address" required><br><br>

        <label>Ghi chú:</label><br>
        <textarea name="note" rows="3"></textarea><br><br>

        <!-- Ảnh QR thanh toán -->
        <div style="text-align: center; margin: 30px 0;">
            <p><strong>Quét mã QR để thanh toán:</strong></p>
            <img src="{{ asset('images/iconn.png') }}" alt="QR thanh toán" width="280" style="border: 1px solid #ccc; border-radius: 10px;">
            <p style="margin-top: 10px;">Ngân hàng: MB Bank<br>Tên người nhận: Phu Minh Duc<br>Số tiền: </p>
        </div>

        <!-- Nút submit -->
        <button type="submit" style="background-color: #2ecc71; padding: 10px 20px; color: white; border: none; border-radius: 6px;">
            🧾 Xác nhận đặt hàng
        </button>
    </form>
@endsection
