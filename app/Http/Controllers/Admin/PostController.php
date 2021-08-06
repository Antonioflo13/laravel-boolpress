<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Post;
use App\Category;
use App\Tag;
class PostController extends Controller
{
    private $postValidationArray = [
        'title' => 'required|max:255',
        'content' => 'required',
        'category_id' => 'nullable|exists:categories,id',
        'tags' => 'exists:tags,id',
        'url_image' => 'nullable|mimes:jpeg,bmp,png,jpg|max:3048'
    ];

    private function generateSlug($data) 
    {
        $slug = Str::slug($data["title"], '-');
        $existingPost = Post::where('slug', $slug)->first();
        $slugBase = $slug;
        $counter = 1;
        while($existingPost) {

            $slug = $slugBase . "-" . $counter;

            $existingPost = Post::where('slug', $slug)->first(); 
            $counter++;
        }

        return $slug;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $request->validate($this->postValidationArray);

        $newPost = new Post();

        $slug = $this->generateSlug($data);
        
        $data['slug'] = $slug;

        if(array_key_exists('url_image', $data)) {

            $data["url_image"] = Storage::put('covers', $data["url_image"]);

        }

        $newPost->fill($data);

        $newPost->save();

        if (array_key_exists('tags', $data)) {
            $newPost->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.posts.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $request->validate($this->postValidationArray);
        
        if ($post->title != $data["title"]) {
            $slug = $this->generateSlug($data);
            $data['slug'] = $slug;
        }

        if(array_key_exists('url_image', $data)) {
            if($post->url_image) {
                Storage::delete($post->url_image);
            }
            $data["url_image"] = Storage::put('covers', $data["url_image"]);

        }

        $post->update($data);

        if (array_key_exists('tags', $data)) {
            $post->tags()->sync($data['tags']);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   
        if ($post->url_image) {
            Storage::delete($post->url_image);
        }

        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
