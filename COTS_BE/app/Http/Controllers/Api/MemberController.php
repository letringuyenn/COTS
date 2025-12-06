<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
        // Return simple list of members (id, name, email)
        $members = DB::table('users_scrum')->select('id', 'name', 'email')->get();
        return response()->json($members);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users_scrum,email',
            'password' => 'nullable|string|min:6',
        ]);

        $data['password'] = isset($data['password']) ? Hash::make($data['password']) : Hash::make('password');
        $id = DB::table('users_scrum')->insertGetId([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'system_role_id' => 2,
            'status_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user = DB::table('users_scrum')->select('id', 'name', 'email')->where('id', $id)->first();

        return response()->json($user, Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        DB::table('users_scrum')->where('id', $id)->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
