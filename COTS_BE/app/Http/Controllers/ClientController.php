<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function checkToken()
    {
        $user_login = Auth::user();  // sanctum tự hiểu guard

        if ($user_login) {
            return response()->json([
                'status' => true,
                'name'   => $user_login->name,
                'email'  => $user_login->email,
                'system_role_id' => $user_login->system_role_id,
                'status_id'      => $user_login->status_id,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Bạn cần đăng nhập hệ thống!',
            ]);
        }
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status'  => false,
                'message' => 'Tài khoản hoặc mật khẩu không chính xác.',
            ]);
        }

        $stored = $user->password ?? '';
        $isBcrypt = is_string($stored) && preg_match('/^\$2(?:y|a|b)\$/', substr($stored, 0, 4));

        $valid = false;

        if ($isBcrypt) {
            $valid = Hash::check($request->password, $stored);
        } else {
            if ($request->password == $stored) {
                $valid = true;
                $user->password = Hash::make($request->password);
                $user->save();
            }
        }

        if ($valid) {
            return response()->json([
                'status'  => true,
                'message' => 'Đăng nhập hệ thống thành công.',
                'name'    => $user->name,
                'user_id' => $user->id,
                'token'   => $user->createToken('client_token')->plainTextToken,
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Tài khoản hoặc mật khẩu không chính xác.',
        ]);
    }
}
