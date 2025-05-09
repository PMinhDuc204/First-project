<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;

    protected $table = 'products'; // Tên bảng trong database

    protected $fillable = ['name', 'price', 'warranty','image']; // Cho phép cập nhật các cột này

    protected $hidden = ['created_at', 'updated_at']; // Ẩn các cột khi trả về JSON

    public $timestamps = true; // Nếu bảng có `created_at` và `updated_at`
}
?>
