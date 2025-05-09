<?php

namespace App\Http\Controllers;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use  App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function add(Request $request)
    {
        $id = $request->input('product_id');
    $sanpham = Sanpham::findOrFail($id);

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            'name' => $sanpham->name,
            'price' => $sanpham->price,
            'quantity' => 1,
            'image' => $sanpham->image,
        ];
    }

    session()->put('cart', $cart);

    return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Giỏ hàng đã được cập nhật!');
    }
    public function checkout()
    {
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Giỏ hàng đang trống!');
    }
    return view('cart.checkout', compact('cart'));
    }
    public function processCheckout(Request $request)
    {
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Giỏ hàng đang trống!');
    }

    $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

    $order = Order::create([
        'user_id' => Auth::id(),
        'total' => $total,
    ]);

        foreach ($cart as $id => $item) {
            OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $id, // THÊM DÒNG NÀY
            'product_name' => $item['name'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);
    }

        session()->forget('cart');

        return redirect()->route('sanpham.index')->with('success', 'Thanh toán thành công! Đơn hàng đã được lưu.');
    }
    // Xóa sản phẩm khỏi giỏ hàng
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }
}
