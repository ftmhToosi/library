<?php

namespace App\Http\Livewire\admin;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ReportBooksCountComponent extends Component
{
    public Collection $books;

    public function mount()
    {
        $this->books = Book::with('user')->get();
    }
    public function render()
    {
        return view('livewire.admin.report-books-count-component');
    }
}
