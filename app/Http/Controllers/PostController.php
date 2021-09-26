<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPosts()
    {
        return Post::all();
    }

    public function savePost(Request $request)
    {
        $newpost = new Post;
        $newpost->title = $request->post["title"];
        $newpost->body = $request->post["body"];
        $newpost->save();
        return $newpost;
    }
    public function updatePost(Request $request, $id)
    {
        $currpost = Post::find($id);
        if ($currpost) {
            $currpost->title = $request->post["title"];
            $currpost->body = $request->post["body"];
            $currpost->save();
            return $currpost;
        }
        return "doesn't exist";
    }
    public function deletePost($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return "deleted";
        }
        return "not found";
    }
}
