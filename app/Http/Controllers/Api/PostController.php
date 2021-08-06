<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::paginate(3);
        return response()->json($posts);
    }
    public function show($slug) {
        $post = Post::where('slug',$slug)->with('category', 'tags')->first();
        if ($post->url_image) {
            $post->url_image = url('storage/' . $post->url_image);
        }else {
            $post->url_image = url('images/placeholder.png');
        }

        return response()->json($post);
    }
}
