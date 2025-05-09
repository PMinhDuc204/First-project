@extends('layouts.main')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <h1 style="text-align: center; color: #2c3e50;">🛍️ Danh sách sản phẩm</h1>

    <!-- Top Buttons -->
    <div class="top-buttons" style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('cart.index') }}" style="background-color: #3498db;">🧺 Xem giỏ hàng ({{ count(session('cart', [])) }})</a>
        <a href="{{ route('orders.history') }}" class="history" style="background-color: #9b59b6;">📜 Lịch sử đơn hàng</a>
    </div>

    <!-- Search -->
    <form action="{{ route('sanpham.index') }}" method="GET" style="display: flex; justify-content: center; margin-bottom: 20px;">
        <input
            type="text"
            name="name"
            placeholder="🔍 Nhập tên sản phẩm"
            value="{{ request('name') }}"
            style="padding: 10px 14px; width: 280px; border-radius: 20px; border: 1px solid #ccc; font-size: 14px;">
        <button
            type="submit"
            style="margin-left: 10px; padding: 10px 18px; border: none; background-color: #2ecc71; color: white; border-radius: 20px; font-weight: bold;">
            Tìm kiếm
        </button>
    </form>

    <!-- Product Table -->
    <table style="width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
        <thead style="background-color: #3498db; color: white;">
            <tr>
                <th style="padding: 12px;">ID</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Bảo hành</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sanpham as $sp)
                <tr style="text-align: center; border-bottom: 1px solid #ddd;">
                    <td style="padding: 10px;">{{ $sp->id }}</td>
                    <td>{{ $sp->name }}</td>
                    <td><img src="{{ asset('storage/' . $sp->image) }}" width="60" height="60" style="border-radius: 6px;"></td>
                    <td>{{ number_format($sp->price, 0, ',', '.') }} đ</td>
                    <td>{{ $sp->warranty }}</td>
                    <td>
                        @auth
                            @if(Auth::user()->role === 'admin')
                                <form action="{{ route('sanpham.edit', $sp->id) }}" method="GET" style="display: inline-block;">
                                    <button style="background-color: #f39c12;">Chỉnh sửa</button>
                                </form>
                                <form action="{{ route('sanpham.destroy', $sp->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button style="background-color: #e74c3c;" onclick="return confirm('Xác nhận xóa?')">Xóa</button>
                                </form>
                            @endif
                            <form action="{{ route('cart.add') }}" method="POST" style="display: inline-block;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $sp->id }}">
                                <button style="background-color: #2ecc71;">🛒 Giỏ</button>
                            </form>
                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div style="text-align: center; margin-top: 25px;">
    <style>
        svg.w-5.h-5 {
            display: none !important;
        }
    </style>
    {{ $sanpham->appends(request()->query())->links() }}
    </div>

    <!-- Add New -->
    <div class="add-product" style="text-align: center; margin-top: 30px;">
        <a href="{{ route('sanpham.create') }}"
            style="background-color: #1abc9c; padding: 10px 20px; border-radius: 30px; color: white; text-decoration: none; font-weight: bold;">
            + Thêm sản phẩm mới
        </a>
    </div>
@endsection
