<?php

namespace App\Http\Livewire\user;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ShowSearchComponent extends Component
{
    public Collection $books;

    public function mount($term)
    {
        $this->books = Book::where(
            'name', 'LIKE', "%$term%")->orWhere(
            'writer', 'LIKE', "%$term%"
        )->get();
    }
    public function render()
    {
        return view('livewire.user.show-search-component');
    }
}
