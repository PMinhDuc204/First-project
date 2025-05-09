@extends('layouts.manage')

@section('content')
    <div class="container">
        <h1 class="my-4">Thêm người dùng</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <!-- Hiển thị thông báo lỗi validation nếu có -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Tên:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu:</label>
                <input type="password" name="password" id="password" class="form-control" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Vai trò:</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="">-- Chọn vai trò --</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Quản trị viên</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Người dùng</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Quay về</button>  <!-- Nút quay về -->
        </form>
    </div>
@endsection
