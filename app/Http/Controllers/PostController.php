<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PageView;
use App\Models\Game;
use App\Models\Category;
use App\Models\Post;
use App\Models\GameCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postsByCategory(Category $category)
    {
        $posts = Post::whereHas('game.categories', function ($query) use ($category) {
            $query->where('categories.category_id', $category->category_id);
        })->paginate(6);
        $categories = Category::all();
        $user = Auth::user();
        $l ='';
        return view('home', compact('posts', 'category','categories','user','l'));
    }
    public function index()
    {
        $user = Auth::user();
        $userId = auth()->id();
        
        $posts = Post::with('user', 'game')->where('user_id', $userId)->latest()->paginate(10);
        $i=0;

        return view('posts.index', compact('posts','user','i'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:255',
        ]);
        
        $user = Auth::user();
        $categories = Category::all();
        $search = $request->input('search');
        $posts = Post::where('title', 'like', "%$search%")
                    ->orWhere('content', 'like', "%$search%")
                    ->orderBy('created_at', 'desc')
                    ->paginate(6);

        return view('home', compact('posts','user','categories'));
    }

    public function create()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('posts.create',compact('categories','user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'game_title' => 'required',
            'game_description' => 'nullable',
            'release_date' => 'required|date',
            'developer' => 'required',
            'platform' => 'required',
            'game_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'category_ids' => 'required|array', 
            'category_ids.*' => 'exists:categories,category_id',
        ]);

        if ($request->hasFile('game_image')) {
            $image = $request->file('game_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $filePath1 = 'images/' . $imageName;
        } else {
            $filePath1 = null;
        }
        if ($request->hasFile('post_image')) {
            $image2 = $request->file('post_image');
            $imageName2 = time() . '.' . $image2->getClientOriginalExtension();
            $image2->move(public_path('images'), $imageName2);
            $filePath = 'images/' . $imageName2;
        } else {
            $filePath = null;
        }

        $game = Game::create([
            'title' => $request->input('game_title'),
            'description' => $request->input('game_description'),
            'release_date' => $request->input('release_date'),
            'developer' => $request->input('developer'),
            'platform' => $request->input('platform'),
            'image' => $filePath1,
            'link' => $request->input('game_link'),
            
        ]);

        foreach ($request->input('category_ids') as $categoryId) {
            GameCategory::create([
                'game_id' => $game->game_id,
                'category_id' => $categoryId,
            ]);
        }
        $gameId = $game->game_id;

        $userId = auth()->id();

        $post = Post::create([
            'title' => $request->input('post_title'),
            'content' => $request->input('post_content'),
            'user_id' => $userId,
            'game_id' => $gameId,
            'image' => $filePath,
            'reports'=> 0,
        ]);
        return redirect()->route('posts.index')->with('success', 'Post and Game created successfully');
    }

    public function show($id)
    {
        $path = request()->path();
        $pageView = PageView::where('path', $path)->first();
        $viewCount = $pageView ? $pageView->count : 0;
        $user = Auth::user();
        $post_comment = Post::with('comments.user')->find($id);
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post','post_comment','user'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
    public function __construct()
{
    $this->middleware('auth')->except(['show']);;
}
}
