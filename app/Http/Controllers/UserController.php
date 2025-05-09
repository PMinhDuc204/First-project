<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    //
    public function index()
    {
    $q = request()->query('q');
    $limit = request()->query('limit', 10);
    $users = User::latest();

    if ($q) {
        $users->where('name', 'like', '%' . $q . '%')
              ->orWhere('email', 'like', '%' . $q . '%')
              ->orWhere('role', 'like', '%' . $q . '%');
    }
    return view('user.quanly', ['users' => $users->paginate($limit)]);
    }
  public function create()
  {
      return view('user.create');
  }

  /**
   * Lưu người dùng mới vào database.
   */
  public function store(UserRequest $request)
  {

    $users = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role,
    ]);

    // Chuyển hướng về trang danh sách người dùng với thông báo thành công
    return redirect()->route('users.index')->with('success', 'Người dùng đã được tạo thành công!');
  }

  /**
   * Hiển thị chi tiết người dùng.
   */
  public function show()
  {

  }

  /**
   * Hiển thị form chỉnh sửa người dùng.
   */
  public function edit($id)
  {
      $users = User::findOrFail($id);
      return view('user.edit', ['users' => $users]);
  }

  /**
   * Cập nhật thông tin người dùng.
   */
  public function update(UserRequest $request, $id)
  {
      $users = User::findOrFail($id);

      $users->update([
          'name' => $request->name,
          'email' => $request->email,
          'password' => $request->password ? bcrypt($request->password) : $users->password,
          'role' => $request->role,
      ]);

      return redirect()->route('users.index')->with('success', 'Người dùng đã được cập nhật thành công!');
  }

  public function destroy($id)
  {
      $users = User::findOrFail($id);
      $users->delete();
      return redirect()->route('users.index')->with('success', 'Người dùng đã bị xóa!');
  }

}

