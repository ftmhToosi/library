<?php

namespace App\Http\Controllers\Api\v1\admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class ReportsController extends Controller
{

    public function reports_book_count(): JsonResponse
    {
        try {
        $data = Book::with('user')->get();
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

    public function reports_user(): JsonResponse
    {
        try {
            $data = User::with('book')->get();
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
}
