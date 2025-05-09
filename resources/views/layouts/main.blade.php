<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang web')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/iconn.png') }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        .top-buttons {
            text-align: center;
            margin-bottom: 20px;
        }

        .top-buttons a {
            text-decoration: none;
            color: white;
            background-color: #e67e22;
            padding: 10px 20px;
            border-radius: 6px;
            margin: 0 5px;
            display: inline-block;
        }

        .top-buttons a.history {
            background-color: #8e44ad;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 16px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            border-radius: 4px;
        }

        .actions form {
            display: inline-block;
            margin: 0 4px;
        }

        button {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            background-color: #2980b9;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #1c6ea4;
        }

        .add-product {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .add-product a {
            text-decoration: none;
            color: white;
            background-color: #2ecc71;
            padding: 10px 20px;
            border-radius: 6px;
            transition: background-color 0.3s;
        }

        .add-product a:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>

    @yield('content')

</body>
</html>
