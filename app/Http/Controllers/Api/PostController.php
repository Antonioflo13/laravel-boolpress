<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index() {
        $posts = Post::paginate(3);
        return response()->json($posts);
    }
    public function categories() {
        $categories = Category::all();
        return response()->json($categories);
    }
}
