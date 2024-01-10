<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('index', ['users' => $users]);
    }
    public function destroy($id)
    {
        $user = User::where('user_id', $id)->first();
        $posts = Post::where('user_id',$id);
        if (!$user) {
            return redirect('/admin/admin')->with('error', 'Người dùng không tồn tại');
        }
        if ($user->userRoles) {
            $user->userRoles()->delete();
        }
        if ($posts) {
        $posts->delete();
        }
        $user->delete();

        return redirect('/admin')->with('success', 'Người dùng đã được xóa thành công');
    }
}