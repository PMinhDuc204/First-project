@extends('layouts.main')

@section('content')
<h2 style="text-align: center; color: #2c3e50;">Thêm sản phẩm mới</h2>

@if ($errors->any())
    <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('sanpham.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    @csrf

    <div style="margin-bottom: 20px;">
        <label for="name" style="font-weight: bold;">Tên sản phẩm:</label>
        <input type="text" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; margin-top: 8px;">
        @error('name')
            <div style="color: red; font-size: 14px; margin-top: 5px;">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 20px;">
        <label for="price" style="font-weight: bold;">Giá:</label>
        <input type="number" name="price" value="{{ old('price') }}" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; margin-top: 8px;">
        @error('price')
            <div style="color: red; font-size: 14px; margin-top: 5px;">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 20px;">
        <label for="warranty" style="font-weight: bold;">Bảo hành:</label>
        <input type="text" name="warranty" value="{{ old('warranty') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; margin-top: 8px;">
        @error('warranty')
            <div style="color: red; font-size: 14px; margin-top: 5px;">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 20px;">
        <label for="image" style="font-weight: bold;">Hình ảnh:</label>
        <input type="file" name="image" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; margin-top: 8px;">
        @error('image')
            <div style="color: red; font-size: 14px; margin-top: 5px;">{{ $message }}</div>
        @enderror
    </div>

    <div style="text-align: center;">
        <button type="submit" style="background-color: #2980b9; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Thêm sản phẩm</button>
    </div>
</form>
@endsection
