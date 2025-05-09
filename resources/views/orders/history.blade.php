@extends('layouts.main')

@section('content')
    <h1>Lịch sử đơn hàng</h1>
    @foreach($orders as $order)
        <div style="border: 1px solid #ccc; padding: 16px; margin-bottom: 20px;">
            <strong>Đơn hàng #{{ $order->id }}</strong> - {{ $order->created_at->format('d/m/Y H:i') }}<br>
            <strong>Tổng tiền:</strong> {{ number_format($order->total, 0, ',', '.') }} đ
            <ul>
                @foreach($order->items as $item)
                    <li>
                        {{ $item->product->name }} - SL: {{ $item->quantity }} - Giá: {{ number_format($item->price, 0, ',', '.') }} đ
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endsection
