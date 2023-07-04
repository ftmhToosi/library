<?php

namespace App\Http\Controllers\Api\v1\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookUserRequest;
use App\Http\Requests\user\BookRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    public function book_show($id=null): JsonResponse
    {
        try {
            $book = Book::find($id);
            if ($book)
            {
                return response()->json(
                    $book,
                    200
                );
            }
            else {
                $data = Book::with('group')->get();
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

    public function book_user_show(BookUserRequest $request): JsonResponse
    {
        try {
            $data = User::with('book')->where('id', $request->user_id)->first();
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

    public function borrow(BookRequest $request, $id): JsonResponse
    {
        try {
            $data = Book::find($request->book_id);
//            dd($data->id);
            if ($data) {
//                $user_id = User::with('book')->where('id', '=', auth()->user()->id)->first();
//                dd(auth()->user()->id);
                $data->user()->attach($id);
                return response()->json(
                    $data,
                    200
                );
            }
            else
                return response()->json([], 404);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function return_book(BookRequest $request, $id)
    {
        try {
            $data = Book::find($request->book_id);
            if ($data) {
                $data->user()->detach($id);
                $data = Book::with('user')->find($request->book_id);
                return response()->json(
                    $data,
                    200
                );
            }
            else
                return response()->json([], 404);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }
}
