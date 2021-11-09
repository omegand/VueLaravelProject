<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function getPosts($id)
    {
        $posts = Post::where('topicid', $id)->get();
        if ($posts->isEmpty()) return response()->json(['Klaida' => "Nėra duomenų arba blogas route."], 404);
        else return $posts;
    }
    public function getUserPosts(Request $request)
    {
        $posts = Post::where('topicid', $request->user()->id)->get();
        if ($posts->isEmpty()) return response()->json(['Klaida' => "Vartotojas neturi postų arba įvyko kita klaida."], 404);
        else return $posts;
    }
    public function getPost($id)
    {
        $post = Post::where('id', $id)->get();
        if ($post->isEmpty()) return response()->json(['Klaida' => "Nėra duomenų arba blogas route."], 404);
        else return $post;
    }

    public function savePost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
            'topicid' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['Klaida' => "Bloga sintaksė"], 400);
        };
        $newpost = new Post;
        $newpost->title = $request->title;
        $newpost->body = $request->body;
        $newpost->topicid = $request->topicid;
        $newpost->save();
        return $newpost;
    }
    public function updatePost(Request $request, $id)
    {
        $currpost = Post::where('id', $id)->get()->first();
        if ($currpost) {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'body' => 'required',
                'topicid' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['Klaida' => "Bloga sintaksė"], 400);
            };
            $currpost->title = $request->title;
            $currpost->body = $request->body;
            $currpost->topicid = $request->topicid;
            $currpost->save();
            return $currpost;
        }
        return response()->json(['Klaida' => "Neegzistuoja postas arba blogas route."], 404);
    }
    public function deletePost($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return response()->json(['Sekminga' => "Ištrinta"]);
        }
        return response()->json(['Klaida' => "Neegzistuoja postas arba blogas route."], 404);
    }
}
