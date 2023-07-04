<?php

namespace App\Http\Controllers\Api\v1\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\MessageRequest;
use App\Models\Message;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $data = Message::all();
            return response()->json(
                $data,
                200
            );
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function store(MessageRequest $request): JsonResponse
    {
        try {
        $data = new Message();
        $data->user_id = $request->user_id;
        $data->read = false;
        $data->save();
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

    public function destroy($id): JsonResponse
    {
        try {
            $data = Message::find($id);
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
