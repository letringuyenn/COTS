<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkspaceController extends Controller
{
    // Lấy danh sách workspace của user hiện tại
    public function getData()
    {
        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn chưa đăng nhập'
            ], 401);
        }

        $workspaces = Workspace::where('created_by', $user->id)->get();

        return response()->json([
            'status' => 1,
            'data' => $workspaces,
            'message' => 'Lấy dữ liệu thành công'
        ]);
    }

    // Tạo workspace mới
    public function addData(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn chưa đăng nhập'
            ], 401);
        }

        // Validate dữ liệu
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            $workspace = Workspace::create([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? '',
                'created_by' => $user->id,
            ]);

            return response()->json([
                'status' => 1,
                'data' => $workspace,
                'message' => 'Tạo workspace thành công'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => 'Lỗi: ' . $e->getMessage()
            ], 500);
        }
    }

    // Cập nhật workspace
    public function update(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn chưa đăng nhập'
            ], 401);
        }

        $workspace = Workspace::find($request->id);

        if (!$workspace) {
            return response()->json([
                'status' => 0,
                'message' => 'Workspace không tồn tại'
            ], 404);
        }

        // Kiểm tra quyền - chỉ người tạo mới được sửa
        if ($workspace->created_by !== $user->id) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền sửa workspace này'
            ], 403);
        }

        try {
            $workspace->update([
                'name' => $request->name ??  $workspace->name,
                'description' => $request->description ??  $workspace->description,
            ]);

            return response()->json([
                'status' => 1,
                'data' => $workspace,
                'message' => 'Cập nhật workspace thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => 'Lỗi: ' . $e->getMessage()
            ], 500);
        }
    }

    // Xóa workspace
    public function destroy(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn chưa đăng nhập'
            ], 401);
        }

        $workspace = Workspace::find($request->id);

        if (! $workspace) {
            return response()->json([
                'status' => 0,
                'message' => 'Workspace không tồn tại'
            ], 404);
        }

        // Kiểm tra quyền - chỉ người tạo mới được xóa
        if ($workspace->created_by !== $user->id) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn không có quyền xóa workspace này'
            ], 403);
        }

        try {
            $workspace->delete();

            return response()->json([
                'status' => 1,
                'message' => 'Xóa workspace thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => 'Lỗi: ' .  $e->getMessage()
            ], 500);
        }
    }
}
