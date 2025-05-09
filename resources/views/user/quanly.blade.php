@extends('layouts.manage')

@section('title', 'Danh Sách Người Dùng')

@section('content')
    <h1 class="text-center mb-4">Danh Sách Người Dùng</h1>

    <!-- Thêm người dùng -->
    <div class="text-end mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-custom">Thêm Người Dùng</a>
    </div>

    <!-- Bảng danh sách người dùng -->
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <!-- Sửa -->
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                        <!-- Xóa -->
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xóa người dùng này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Không có người dùng nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
