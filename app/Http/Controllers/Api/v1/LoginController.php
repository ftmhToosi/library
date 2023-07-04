<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UsersRequest;
use App\Http\Requests\user\LoginRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = User::whereEmail($request->email)->first();
                auth()->loginUsingId($user->id);
                return response()->json(
                    $user,
                    200
                );
            } else
                return response()->json(
                    ['message' => 'User not found'],
                    401
                );
        }catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function register(UsersRequest $request): JsonResponse
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
        }catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }
}
