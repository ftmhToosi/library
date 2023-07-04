<?php

namespace App\Http\Controllers\Api\v1\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoryRequest;
use App\Http\Requests\admin\CategoryUpdateRequest;
use App\Models\Grouping;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $data = Grouping::all();
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

    public function store(CategoryRequest $request): JsonResponse
    {
        try {
            $data = new Grouping();
            $data->title = $request->title;
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

    public function update(CategoryUpdateRequest $request, $id): JsonResponse
    {
        try {
            $data = Grouping::find($id);
            if ($data) {
                $data->title = $request->title ?? $data->title;
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
            $data = Grouping::find($id);
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
