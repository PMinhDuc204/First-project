<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Sanpham;
use Illuminate\Http\Request;

class SanphamController extends Controller
{
    public function index(Request $request)
    {
        $sanpham = Sanpham::when(!empty($request->name), function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->name . '%');
        })->paginate(5);

        return view('several.index', ['sanpham' => $sanpham]);
        // return response()->json([
        //     'success' => true,
        //     'data' => $sanpham,
        //     'message' => 'Danh sách sản phẩm'
        // ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('several.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateProductRequest $request)
    {
        //
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('storage'), $imageName);
        }

        Sanpham::create([
            'name' => $request->name,
            'price' => $request->price,
            'warranty' => $request->warranty,
            'image' => $request->$imageName
        ]);

        return redirect()->route('sanpham.index')->with('success', 'Sản phẩm đã được thêm thành công!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $sanpham = Sanpham::findOrFail($id); // Tìm sản phẩm theo ID
        return view('several.edit', compact('sanpham')); // Trả về view edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        //
        $sanpham = Sanpham::findOrFail($id);

    // Cập nhật thông tin sản phẩm
        $sanpham->update([
        'name' => $request->name,
        'warranty' => $request->warranty,
        'price' => $request->price,
        ]);

    // Nếu có upload ảnh mới
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $sanpham->update(['image' => $imagePath]);
        }

    // Chuyển hướng về danh sách sản phẩm
    return redirect()->route('sanpham.index')->with('success', 'Sản phẩm đã được cập nhật!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $sanpham = Sanpham::findOrFail($id);
    $sanpham->delete();
    return redirect()->route('sanpham.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}
?>
