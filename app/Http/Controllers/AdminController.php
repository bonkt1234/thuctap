<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Role;
use App\Models\PageView;
class AdminController extends Controller
{
    public function index()
    {
        $reportedPosts = Post::where('reports', '>', 0)->get();
        $users = User::all();
        $user = Auth::user();
        $pageView = PageView::where('path','/')->first();
        return view('/admin/admin',compact('users','user','reportedPosts','pageView'));
    }
    public function grantAdminRole($userId)
    {
        $user = User::findOrFail($userId);
        $adminRole = Role::where('name', 'admin')->firstOrFail();
        
        $user->roles()->attach($adminRole);

        return redirect()->back()->with('success', 'Admin role granted successfully');
    }
}