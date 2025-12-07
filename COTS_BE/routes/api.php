<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\WorkspaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/khach-hang/check-token', [ClientController::class, 'checkToken']);
Route::post('/khach-hang/dang-nhap', [ClientController::class, 'login']);

Route::prefix('workspace')->group(function () {
    Route::get('/get-data', [WorkspaceController::class, 'getData']);
    Route::post('/add-data', [WorkspaceController::class, 'addData']);
    Route::put('/update', [WorkspaceController::class, 'update']);
    Route::post('/delete', [WorkspaceController::class, 'destroy']);
});
