<?php

namespace App\Http\Livewire\admin;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReportsShowComponent extends Component
{
//    public Collection $books_id;
    public Collection $books;
    public Collection $users;

    public function mount()
    {
        $this->users = User::with('book')->get();

    }
    public function render()
    {
        return view('livewire.admin.reports-show-component');
    }
}
