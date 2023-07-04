<?php

namespace App\Http\Controllers;

use App\Models\Book;

class UserController extends Controller
{
    public function app()
    {
        return view('user.content');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function login()
    {
        return view('user.login');
    }

    public function show_profile()
    {
        return view('user.show_profile');
    }

    public function logout()
    {
        return view('user.logout');
    }

    public function show_book($id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Contracts\Foundation\Application
    {
        try {
            $data = Book::find($id);
            if ($data) {
                return view('user.show_book', ['id'=>$id]);
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
