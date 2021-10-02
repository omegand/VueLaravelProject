<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function getTopics()
    {
        $topics = Topic::all();
        if ($topics->isEmpty()) return response()->json(['Klaida' => "Nėra duomenų arba blogas route."], 404);

        else return $topics;
    }
    public function getTopic($id)
    {
        $topic = Topic::where('id', $id)->get();
        if ($topic->isEmpty()) return response()->json(['Klaida' => "Nėra duomenų arba blogas route."], 404);
        else return $topic;
    }

    public function saveTopic(Request $request)
    {
        $new = new Topic;
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['Klaida' => "Bloga sintaksė"], 400);
        };
        $new->title = $request->title;
        $new->desc = $request->desc;
        $new->save();
        return $new;
    }

    public function updateTopic(Request $request, $id)
    {
        $curr = Topic::find($id);
        if ($curr) {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'desc' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['Klaida' => "Bloga sintaksė"], 400);
            };
            $curr->title = $request->title;
            $curr->desc = $request->desc;
            $curr->save();
            return $curr;
        }
        return response()->json(['Klaida' => "Neegzistuoja arba blogas route."], 404);    }

    public function deleteTopic($id)
    {
        $topic = Topic::find($id);
        if ($topic) {
            $topic->delete();
            return response()->json(['Sekminga' => "Ištrinta."]);
        }
        return response()->json(['Klaida' => "Neegzistuoja tema arba blogas route."], 404);
    }
}
