<?php

namespace App\Http\Controllers\Api\v1\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\BookAdminRequest;
use App\Http\Requests\admin\BookAdminUpdateRequest;
use App\Models\Book;
use App\Models\Grouping;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class BookAdminController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $data = Book::all();
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

    public function store(BookAdminRequest $request): JsonResponse
    {
        try {
            $data = explode(',', $request->image);
            $ext = explode('/', $data[0]);
            $image_type = str_replace(';base64', '', $ext[1]);
            $image = Str::random(65) . $image_type;
            $this->base64_to_jpeg($data[1], storage_path('app/public/'), $image);
            $data = new Book();
            $data->name = $request->name;
            $data->writer = $request->writer;
            $data->description = $request->description;
            $data->image = $image;
            $data->save();
            $data->group()->attach($request->grouping_id);
            return response()->json([
                'success' => true,
                'last_id' => $data->id,
            ], 201);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function update(BookAdminUpdateRequest $request, $id): JsonResponse
    {
        try {
            $data = Book::find($id);
            if ($data) {
                $im = explode(',', $request->image);
                $ext = explode('/', $im[0]);
                $image_type = str_replace(';base64', '', $ext[1]);
                $image = Str::random(65) . $image_type;
                $this->base64_to_jpeg($im[1], storage_path('app/public/'), $image);

                $data->name = $request->name ?? $data->name;
                $data->writer = $request->writer ?? $data->writer;
                $data->description = $request->description ?? $data->description;
                $data->image = $image ?? $data->image;
                $data->save();
                $data->group()->sync($request->grouping_id);
                return response()->json([
                    'success' => true,
                ], 202);
            } else {
                return response()->json([], 404);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $data = Book::find($id);
            if ($data) {
                $data->delete();
                return response()->json([
                    'success' => true,
                ], 204);
            } else {
                return response()->json([], 404);
            }
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    function base64_to_jpeg($base64_string, $output_file, $filename)
    {
        $ifp = fopen($output_file . $filename, 'wb');

        fwrite($ifp, base64_decode($base64_string));
        fclose($ifp);

        return $output_file;
    }
}
