<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function getPosts($id)
    {
        return Post::where('topicid',$id)->get();
    }
    public function getPost($id)
    {
        return Post::where('id',$id)->get();
    }

    public function savePost(Request $request)
    {
        $newpost = new Post;
        $newpost->title = $request->post["title"];
        $newpost->body = $request->post["body"];
        $newpost->topicid = $request->post["topicid"];
        $newpost->save();
        return $newpost;
    }
    public function updatePost(Request $request,$id)
    {
        $currpost = Post::where('id',$id)->get()->first();
        if ($currpost) {
            $currpost->title = $request->post["title"];
            $currpost->body = $request->post["body"];
            $currpost->topicid =$request->post["topicid"];
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
