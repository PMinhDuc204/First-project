@extends('layouts.main')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center" style="color: #2c3e50;">Chỉnh sửa sản phẩm</h2>

    <form action="{{ route('sanpham.update', $sanpham->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $sanpham->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="warranty" class="form-label">Thời gian bảo hành</label>
            <input type="text" name="warranty" class="form-control @error('warranty') is-invalid @enderror" value="{{ old('warranty', $sanpham->warranty) }}">
            @error('warranty')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $sanpham->price) }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh</label><br>
            <img src="{{ asset('storage/' . $sanpham->image) }}" width="150" alt="Sanpham Image" class="mb-2"><br>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror mt-2">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
