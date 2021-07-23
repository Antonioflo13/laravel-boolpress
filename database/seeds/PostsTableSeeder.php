<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = config('posts');
        // $posts = Post::all();

        foreach ($posts as $post) {
            $newpost = new Post();
            $newpost->title = $post['title'];
            $newpost->content = $post['content'];
            $newpost->slug = Str::slug($post['title'], '-');
            $newpost->save();
        }

    }
}
