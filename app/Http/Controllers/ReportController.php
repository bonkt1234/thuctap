<?php

namespace App\Http\Controllers;

use App\Models\Post;

class ReportController extends Controller
{
    public function toggleReport($postId)
    {
        $post = Post::find($postId);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        // Tăng giảm giá trị của trường reports
        $post->reports = $post->reports ? 0 : 1;
        $post->save();

        return response()->json(['message' => 'Report toggled successfully', 'reports' => $post->reports]);
    }
}
