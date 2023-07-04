<?php

namespace App\Http\Controllers\Api\v1\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UsersRequest;
use App\Http\Requests\admin\UsersUpdateRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{
    public function show_user($id=null): JsonResponse
    {
        try {
            $user = User::with('book')->find($id);
            if ($user){
                return response()->json(
                    $user,
                    200
                );
            }
            else {
                $data = User::all();
                return response()->json(
                    $data,
                    200
                );
            }
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function store(UsersRequest $request): JsonResponse
    {
        try {
            $data = new User();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->save();
            $prof = new Profile();
            $prof->user_id = $data->id;
            $prof->name = 'None';
            $prof->phone = 'None';
            $prof->username = 'None';
            $prof->bio = 'None';
            $prof->save();
            return response()->json([
                'success' => true,
                'last_id' => $data->id,
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function update(UsersUpdateRequest $request, $id): JsonResponse
    {
        try {
            $data = User::find($id);
            if ($data) {
                $data->name = $request->name ?? $data->name;
                $data->email = $request->email ?? $data->email;
                $data->password = $request->password ?? $data->password;
                $data->save();
                return response()->json([
                    'success' => true,
                ], 202);
            } else {
                return response()->json([], 404);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $data = User::find($id);
            if ($data) {
                $data->delete();
                return response()->json([
                    'success' => true,
                ], 204);
            } else {
                return response()->json([], 404);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 500);
        }
    }
}
