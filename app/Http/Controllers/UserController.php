<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getusers()
    {
        $users = User::all();
        if ($users->isEmpty()) return response()->json(['Klaida' => "Nėra duomenų arba blogas route."], 404);
        else return $users;
    }
    public function getuser($id)
    {
        $user = User::where('id', $id)->get();
        if ($user->isEmpty()) return response()->json(['Klaida' => "Nėra duomenų arba blogas route."], 404);
        else return $user;
    }

    public function saveuser(Request $request)
    {
        $new = new User;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['Klaida' => "Bloga sintaksė"], 400);
        };
        $password = Hash::make($request->password);
        $new->name = $request->name;
        $new->email = $request->email;
        $new->password = $password;
        $new->save();
        return $new;
    }

    public function updateuser(Request $request, $id)
    {
        $curr = User::find($id);
        if ($curr) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email'
            ]);
            if ($validator->fails()) {
                return response()->json(['Klaida' => "Bloga sintaksė"], 400);
            };
            $curr->name = $request->name;
            $curr->email = $request->email;
            $curr->save();
            return $curr;
        }
        return response()->json(['Klaida' => "Neegzistuoja arba blogas route."], 404);
    }

    public function deleteuser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['Sekminga' => "Ištrinta."]);
        }
        return response()->json(['Klaida' => "Neegzistuoja tema arba blogas route."], 404);
    }
}
