<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Xác định xem người dùng có được phép thực hiện yêu cầu này không.
     */
    public function authorize(): bool
    {
        return true; // Thay đổi nếu cần kiểm tra quyền
    }

    /**
     * Lấy các quy tắc xác thực áp dụng cho yêu cầu.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'warranty' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống!',
            'price.required' => 'Giá sản phẩm không được để trống!',
            'price.numeric' => 'Giá sản phẩm phải là số!',
            'image.image' => 'File tải lên phải là hình ảnh!',
            'image.mimes' => 'Chỉ chấp nhận các định dạng ảnh: jpeg, png, jpg, gif!',
        ];
    }
}
