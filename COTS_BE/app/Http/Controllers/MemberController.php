<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // hoặc UserScrum model nếu bạn dùng users_scrum

class MemberController extends Controller
{
    public function index(Request $request)
    {
        // nếu có workspace filter bạn có thể thêm ->where('workspace_id', $id)
        return response()->json(User::select('id','name','email')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users_scrum,email',
            'password' => 'nullable|string|min:6'
        ]);

        $data['password'] = bcrypt($data['password'] ?? 'defaultpass');
        $user = User::create($data);
        return response()->json($user, 201);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }
}
