<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Lấy id người dùng từ route (chỉ khi chỉnh sửa người dùng)
        $id = $this->route('user');

        // Đặt rule cho email, nếu có id thì bỏ qua kiểm tra trùng với chính email của người dùng hiện tại
        $emailRule = 'required|email|unique:users,email';
        if ($id) {
            $emailRule .= ",{$id}";
        }

        // Quy tắc chung cho các trường
        return [
            'name' => 'required|min:4',
            'email' => $emailRule,
            'password' => $id ? 'nullable|min:6' : 'required|min:6', // Mật khẩu chỉ bắt buộc khi tạo mới
            'role' => 'required|in:admin,user',
        ];
    }

    /**
     * Định nghĩa các thông báo lỗi tùy chỉnh.
     */
    public function messages(): array
    {
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'min' => ':attribute phải từ :min ký tự',
            'email' => ':attribute phải định dạng email',
            'unique' => ':attribute đã tồn tại',
            'nullable' => ':attribute không được để trống khi chỉnh sửa',
        ];
    }

    /**
     * Định nghĩa tên các thuộc tính cho các trường
     */
    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
        ];
    }
}
?>
