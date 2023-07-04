<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Grouping;
use Illuminate\Contracts\View\Factory;

class LibraryController extends Controller
{
    public function app()
    {
        return view('admin.content');
    }

    public function manage_library()
    {
        return view('admin.manage_library');
    }

    public function manage_grouping()
    {
        return view('admin.manage_grouping');
    }

    public function edit_category($id): \Illuminate\Contracts\View\View|Factory|\Illuminate\Http\JsonResponse|\Illuminate\Contracts\Foundation\Application
    {
        $data = Grouping::find($id);
        if ($data) {
            return view('admin.edit_category', ['id'=>$id]);
        } else {
            return response()->json([], 404);
        }
    }

    public function edit_book($id): \Illuminate\Contracts\View\View|Factory|\Illuminate\Http\JsonResponse|\Illuminate\Contracts\Foundation\Application
    {
        $data = Book::find($id);
        if ($data) {
            return view('admin.edit_book', ['id'=>$id]);
        } else {
            return response()->json([], 404);
        }
    }

    public function register(): Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.register');
    }

    public function login(): Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.login');
    }

    public function manage_user(): Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.manage_user');
    }

    public function manage_message(): Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.manage_message');
    }

    public function manage_reports()
    {
        return view('admin.manage_reports');
    }

    public function show_search($term): \Illuminate\Contracts\View\View|Factory|\Illuminate\Http\JsonResponse|\Illuminate\Contracts\Foundation\Application
    {
            return view('user.show_search', ['term'=>$term]);

    }
}
