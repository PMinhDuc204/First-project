<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Quản lý Người Dùng')</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ3QXjH1L7Fh2fPfeY2jGvFzFh6O5Z0g60X3wtrpzF0ByIj1bp93yR7pV1zD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJfL4S3Q+3dBDHl3Fi8+ue6DoiTVJxBMT2A8f2/f6c8F1qtAy6u4Ahrv+hH5" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5; /* Nền trắng nhạt */
            color: #333; /* Màu chữ tối để dễ đọc */
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 30px;
            background: #ffffff; /* Nền trắng cho container */
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        h1 {
            color: #d32f2f; /* Màu đỏ cho tiêu đề */
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5rem;
        }
        .btn-custom {
            background-color: #d32f2f; /* Màu đỏ cho nút "Thêm Người Dùng" */
            color: white;
            border-radius: 25px;
            padding: 8px 20px; /* Giảm padding từ 10px 25px xuống 8px 20px */
            font-size: 0.9rem; /* Giảm kích thước chữ */
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-custom:hover {
            background-color: #b71c1c; /* Đỏ đậm hơn khi hover */
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            background-color: #ffffff; /* Nền trắng cho bảng */
        }
        .table thead {
            background-color: #d32f2f; /* Màu đỏ cho tiêu đề bảng */
            color: white;
        }
        .table th, .table td {
            padding: 15px;
            text-align: center;
            vertical-align: middle;
        }
        .table tbody tr {
            transition: background-color 0.2s ease;
        }
        .table tbody tr:hover {
            background-color: #fff9e6; /* Màu vàng nhạt khi hover */
        }
        .btn-action {
            padding: 5px 15px;
            font-size: 0.9rem;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        .btn-warning {
            background-color: #ffca28; /* Màu vàng cho nút "Sửa" */
            color: #333;
            padding: 5px 15px;
            font-size: 0.9rem;
            border-radius: 20px;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-warning:hover {
            background-color: #ffb300; /* Vàng đậm hơn khi hover */
        }
        .btn-danger {
            background-color: #d32f2f; /* Màu đỏ cho nút "Xóa" */
            color: white;
            padding: 5px 15px;
            font-size: 0.9rem;
            border-radius: 20px;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-danger:hover {
            background-color: #b71c1c; /* Đỏ đậm hơn khi hover */
        }
        footer {
            text-align: center;
            padding: 15px;
            margin-top: 40px;
            background-color: #ffffff; /* Nền trắng cho footer */
            border-top: 1px solid #e0e0e0;
            font-size: 0.9rem;
            color: #666;
        }
        footer p {
            margin: 0;
        }
        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin: 20px;
            }
            h1 {
                font-size: 1.8rem;
            }
            .table th, .table td {
                padding: 10px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>© {{ date('Y') }} - Laravel User Management</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0qHg3O4eBvq0bU5h5FcD6XKcQoWhAmz4Pzk7qXTkgo9JkqV9" crossorigin="anonymous"></script>
</body>
</html>
