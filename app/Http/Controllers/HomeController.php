<?php

namespace App\Http\Controllers;
use App\Models\PageView;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
class HomeController extends Controller
{
    public function index()
    {
        $path = request()->path();
        $pageView = PageView::where('path', $path)->first();
        $viewCount = $pageView ? $pageView->count : 0;
        $posts = Post::paginate(6);
        $user = Auth::user();
        $categories = Category::all();
        return view('home', compact('user','posts','categories','viewCount'));
    }
    
}