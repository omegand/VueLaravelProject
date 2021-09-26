<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function getTopics()
    {
        return Topic::all();
    }
    public function getTopic($id)
    {
        return Topic::where('id',$id)->get();
    }

    public function saveTopic(Request $request)
    {
        $new = new Topic;
        $new->title = $request->topic["title"];
        $new->desc = $request->topic["desc"];
        $new->save();
        return $new;
    }
    
    public function updateTopic(Request $request, $id)
    {
        $curr = Topic::find($id);
        if ($curr) {
            $curr->title = $request->topic["title"];
            $curr->desc = $request->topic["desc"];
            $curr->save();
            return $curr;
        }
        return "doesn't exist";
    }

    public function deleteTopic($id)
    {
        $topic = Topic::find($id);
        if ($topic) {
            $topic->delete();
            return "deleted";
        }
        return "not found";
    }
}
